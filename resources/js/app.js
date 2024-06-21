// import './bootstrap';

Echo.channel('PDU_Dashboard')
    .listen('DataUpdated', (e) => {
        console.log('Data updated:', e.data);

        // Update the DOM with the new data
        document.getElementById('date').innerText = e.data.datetime;
    });