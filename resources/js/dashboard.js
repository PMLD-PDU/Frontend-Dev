document.addEventListener('DOMContentLoaded', function() {
    const wellId = document.getElementById('dashboard-container').getAttribute('data-well-id');

    function fetchData() {
        fetch(`/api/dashboard-data?well_id=${wellId}`)
            .then(response => response.json())
            .then(data => {
                let latestData = data[data.length - 1];

                // Dispatch custom event with latestData
                const event = new CustomEvent('latestDataUpdated', { detail: data });
                document.dispatchEvent(event);

                // Update DOM elements with new data
                document.getElementById('bit_depth').innerText = latestData['bitdepth'] || "N/A";
                document.getElementById('bit_depth_sidebar').innerText = latestData['bitdepth'] || "N/A";
                document.getElementById('drill_depth_sidebar').innerText = latestData['bitdepth'] || "N/A";
                document.getElementById('tank_vol_total').innerText = latestData['tankvoltot'] || "N/A";
                document.getElementById('tank_scfm').innerText = latestData['scfm']  || "N/A";
                document.getElementById('tank_mud_cond_in').innerText = latestData['mudcondin'] || "N/A";
                document.getElementById('tank_mud_cond_out').innerText = latestData['mudcondout'] || "N/A";
                document.getElementById('spm_total').innerText = latestData['totspm'] || "N/A";
                document.getElementById('spm_surpress').innerText = latestData['sppress'] || "N/A";
                document.getElementById('spm_mud_flow_in').innerText = latestData['mudflowin'] || "N/A";
                document.getElementById('spm_4').innerText = latestData['co2_1'] || "N/A";
                document.getElementById('TORQVal').innerText = latestData['torque'] || "N/A";
                document.getElementById('BlockVal').innerText = latestData['blockpos'] || "N/A";
                document.getElementById('ROPiVal').innerText = latestData['ropin'] || "N/A";
                document.getElementById('FlowOutVal').innerText = latestData['mudflowoutp'] || "N/A";
                document.getElementById('BacksideVal').innerText = latestData['gas'] || "N/A";
                document.getElementById('PitVolumeVal').innerText = latestData['bvdepth'] || "N/A";
                document.getElementById('MWOutVal').innerText = latestData['mudcondout'] || "N/A";
                document.getElementById('TempOutVal').innerText = latestData['mudtempout'] || "N/A";
                document.getElementById('TempInVal').innerText = latestData['mudtempin'] || "N/A";
                document.getElementById('H2SShakerVal').innerText = latestData['h2s_1'] || "N/A";
                document.getElementById('H2SCellarVal').innerText = latestData['co2_1'] || "N/A";
                document.getElementById('H2SMudPondVal').innerText = latestData['gas'] || "N/A";

                // Navbar
                document.getElementById('wellName').innerText = ((latestData['well'])['name'])|| "N/A";

                // // Update charts if necessary
                // chart.data.datasets[0].data = data.chart1Data; // Update with your actual data source
                // chart.update();
                // chart1.data.datasets[0].data = data.chart2Data; // Update with your actual data source
                // chart1.update();
                
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function displayCurrentDateTime() {
        const now = new Date();

        const day = String(now.getDate()).padStart(2, '0');
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const year = now.getFullYear();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedDate = `${day}-${month}-${year}`;
        const formattedTime = `${hours}:${minutes}:${seconds}`;

        document.getElementById('date').textContent = formattedDate;
        document.getElementById('time').textContent = formattedTime;
    }

    setInterval(displayCurrentDateTime, 1000);
    setInterval(fetchData, 10000);

    fetchData();
});
