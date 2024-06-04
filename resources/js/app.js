import './bootstrap';

Echo.channel('PDU_Dashboard')
    .listen('DataUpdated', (apiDate) => {
        console.log('Data updated:', apiDate.data);

        date = getCurrentDateTime()
        // Update the DOM with the new data
        document.getElementById('date').innerText = date;
    });

// Function to get the current date and time in the required format
function getCurrentDateTime() {
    const now = apiDate.data.datetime;
    return now.toISOString()
    ; // Formats the date to YYYY-MM-DDTHH:MM:SS.SSSZ
}