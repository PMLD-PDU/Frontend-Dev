let base_url_api_model = 'http://103.176.79.218:5000';
let well_id = document.getElementById('dashboard-container').getAttribute('data-well-id');
console.log(well_id);

$(document).ready(function(){
    // get 10 notification data and populate notification
    get_notification_data(true, well_id);

    // get latest notification every 15 seconds
    setInterval(function() {
        get_notification_data(false, well_id);
    }, 12000);
});

function get_notification_data(newly_started, well_id) {
    var today = new Date().toISOString().slice(0, 10)
    var query_data = {
        "well_id": well_id,
        "date_start": today,
        "date_end": today,
        "limit": newly_started ? 10 : 1
    }

    $.ajax({
        data: JSON.stringify(query_data),
        type: 'POST',
        processData: false,
        contentType: 'application/json',
        url: `${base_url_api_model}/notifications/`,
        success: function(data) {
            // update data in notification container
            update_notification_container(data['response'], newly_started)
        },
        error: function(xhr, status, error) {
            // Check for "Connection Refused"
            if (xhr.status === 0) {
                console.log('Error: Connection Refused');
            } else {
                console.log(`Error: Cannot get notification data! Status: ${status}, Error: ${error}`);
            }
        }
    });
}

function update_notification_container(data, newly_started) {
    console.log(data)
    if (newly_started) {
        data.forEach(element => {
            // construct html code
            $(".notification-data-container").prepend(get_notification_container_html(element));

        });
    } else {
        // update notification container
        $(".notification-data-container").find('div:first').remove();
        $(".notification-data-container").last().append(get_notification_container_html(data[0]));
    }

    // CAUTION: Container height need to be in fixed value!
    $(".notification-data-container").animate({ scrollTop: $('.notification-data-container')[0].scrollHeight}, 1500);
}


function get_notification_container_html(element) {
    if (element['prediction'].toLowerCase() === 'tidak stuck') {
        var html_element = `
            <div class="notification-data row align-items-center py-3">
                <div class="col-auto mb-0"><p class=" mb-0"><i class="bi bi-check-all notification-icon"></i></p></div>
                <div class="col mb-0">
                    <p class="notification-title mb-1"> ${element['prediction']} </p>
                    <p class="notification-date mb-0"> <i class="bi bi-calendar-week"></i> ${element['prediction_date']}</p>
                </div>
            </div>
        `;
    } else {
        var html_element = `
            <div class="notification-data notification-alert row align-items-center py-3 my-2">
                <div class="col-auto mb-0"><p class=" mb-0"><i class="bi bi-check-all notification-icon"></i></p></div>
                <div class="col mb-0">
                    <p class="notification-title mb-1"> ${data[0]['prediction']} </p>
                    <p class="notification-date mb-0"> <i class="bi bi-calendar-week"></i> ${data[0]['prediction_date']}</p>
                </div>
            </div>
        `;
    }

    return html_element;
}
