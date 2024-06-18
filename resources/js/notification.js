document.addEventListener('DOMContentLoaded', function() {
  const wellId = document.getElementById('dashboard-container').getAttribute('data-well-id');
  const notificationContainer = document.getElementById('notification-container');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  let lastNotificationIds = new Set();

  function fetchNotification() {
    fetch(`/api/notification?well_id=${wellId}`)
      .then(response => response.json())
      .then(data => {
          const notifications = data.data;
          displayNotifications(notifications);
      });
  }

  function displayNotifications(notifications) {
    notificationContainer.innerHTML = ''; 

    displaySeenNotifications();

    notifications.forEach(notification => {
      const isNewNotification = !lastNotificationIds.has(notification.id);
      const notificationElement = createNotificationElement(notification, isNewNotification);
      notificationContainer.insertBefore(notificationElement, notificationContainer.firstChild);
      lastNotificationIds.add(notification.id);
    });
  }

  function createNotificationElement(notification, isNewNotification = false) {
    if (!notification) {
        console.error('Notification is null or undefined:', notification);
        return document.createElement('div');
    }

    const createdAt = new Date(notification.createdAt).toLocaleString('en-US', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });

    const notificationElement = document.createElement('div');
    notificationElement.className = `flex flex-row ${notification.seen ? 'bg-white' : 'bg-red-500 rounded-t-xl'} transition-opacity duration-500 ${isNewNotification ? 'opacity-0' : 'opacity-100'}`;

    notificationElement.innerHTML = `
        <i class="${notification.seen ? 'fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center' : 'fa-solid fa-exclamation-triangle fa-lg p-2.5 text-white content-center'}"></i>
        <div class="flex flex-col p-2 align-middle text-xs ${notification.seen ? 'text-pdu-orange' : 'text-white'}">
            <p class="pb-2 font-bold">${notification.title}</p>
            <p class="pb-3 font-medium">${notification.message}</p>
            <p class="${notification.seen ? 'text-pdu-orange' : 'text-pdu-white'} font-normal">${createdAt}</p>
        </div>
        <button class="ml-auto p-2 text-white" onclick="markAsSeen('${notification.id}', ${JSON.stringify(notification).replace(/"/g, '&quot;')}, this)">&times;</button>
    `;
    
    if (isNewNotification) {
        requestAnimationFrame(() => {
            notificationElement.classList.remove('opacity-0');
            notificationElement.classList.add('opacity-100');
        });
    }
    
    return notificationElement;
  }

  window.markAsSeen = function(notificationId, notificationData, buttonElement) {
    fetch(`/api/well/${wellId}/notification/${notificationId}/seen`, {
      method: 'PATCH',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      }
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      if (data.data.seen) {
        notificationData.seen = true; 
        saveNotificationToLocalStorage(notificationData); 
        moveNotificationToBottom(buttonElement.parentElement); 
      }
    })
    .catch(error => console.error('Error updating notification:', error));
  };

  function saveNotificationToLocalStorage(notification) {
    let seenNotifications = JSON.parse(localStorage.getItem('seenNotifications')) || [];
    seenNotifications.push(notification);
    
    // Ensure only the latest 15 notifications are kept
    if (seenNotifications.length > 15) {
      seenNotifications = seenNotifications.slice(seenNotifications.length - 15);
    }

    localStorage.setItem('seenNotifications', JSON.stringify(seenNotifications));
  }

  function displaySeenNotifications() {
    const seenNotifications = JSON.parse(localStorage.getItem('seenNotifications')) || [];
    seenNotifications.forEach(notification => {
      const notificationElement = createNotificationElement(notification);
      notificationContainer.appendChild(notificationElement);
    });
  }

  function moveNotificationToBottom(notificationElement) {
    notificationElement.classList.add('opacity-0');
    notificationElement.classList.remove('opacity-100');

    // Wait for the fade-out transition to complete
    setTimeout(() => {
      notificationContainer.appendChild(notificationElement);
      notificationElement.classList.remove('bg-red-500', 'text-white', 'rounded-t-xl');
      notificationElement.classList.add('bg-white', 'text-pdu-orange');
      notificationElement.querySelector('i').className = 'fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center';
      // Apply fade-in animation to new position
      requestAnimationFrame(() => {
        notificationElement.classList.remove('opacity-0');
        notificationElement.classList.add('opacity-100');
      });
    }, 500);
  }

  fetchNotification();

  setInterval(fetchNotification, 2000);
});