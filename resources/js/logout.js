document.getElementById("dropdownButton").addEventListener("click", function(event) {
  event.stopPropagation(); // Prevent the event from bubbling up to document
  var menu = document.getElementById("dropdownMenu");
  if (menu.style.display === "none" || menu.style.display === "") {
    menu.style.display = "block";
    menu.classList.add('opacity-100', 'scale-100');
    menu.classList.remove('opacity-0', 'scale-95');
  } else {
    menu.style.display = "none";
    menu.classList.add('opacity-0', 'scale-95');
    menu.classList.remove('opacity-100', 'scale-100');
  }
});

// Close the dropdown when clicking outside of it
document.addEventListener("click", function(event) {
  var menu = document.getElementById("dropdownMenu");
  var button = document.getElementById("dropdownButton");
  if (!button.contains(event.target) && !menu.contains(event.target)) {
    menu.style.display = "none";
    menu.classList.add('opacity-0', 'scale-95');
    menu.classList.remove('opacity-100', 'scale-100');
  }
});