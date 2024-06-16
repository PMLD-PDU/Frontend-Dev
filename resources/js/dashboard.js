document.addEventListener('DOMContentLoaded', function() {
    const wellId = document.getElementById('dashboard-container').getAttribute('data-well-id');

    function fetchData() {
        fetch(`http://127.0.0.1:8000/api/dashboard-data?well_id=${wellId}`)
            .then(response => response.json())
            .then(data => {
                const latestData = data[data.length - 1];
                console.log(latestData);
                // Update DOM elements with new data
                document.getElementById('bit_depth').innerText = latestData['bitdepth'];
                document.getElementById('tank_vol_total').innerText = data.tankvoltot;
                document.getElementById('tank_scfm').innerText = data.scfm;
                document.getElementById('tank_mud_cond_in').innerText = data.mudcondin;
                document.getElementById('tank_mud_cond_out').innerText = data.mudcondout;
                document.getElementById('spm_total').innerText = data.totspm;
                document.getElementById('spm_surpress').innerText = data.sppress;
                document.getElementById('spm_mud_flow_in').innerText = data.mudflowin;
                document.getElementById('spm_4').innerText = data.co2_1;
                document.getElementById('TORQVal').innerText = data.torque;
                document.getElementById('BlockVal').innerText = data.blockpos;
                document.getElementById('ROPiVal').innerText = data.ropin;
                document.getElementById('FlowOutVal').innerText = data.mudflowoutp;
                document.getElementById('BacksideVal').innerText = data.gas;
                document.getElementById('PitVolumeVal').innerText = data.bvdepth;
                document.getElementById('MWOutVal').innerText = data.mudcondout;
                document.getElementById('TempOutVal').innerText = data.mudtempout;
                document.getElementById('TempInVal').innerText = data.mudtempin;
                document.getElementById('H2SShakerVal').innerText = data.h2s_1;
                document.getElementById('H2SCellarVal').innerText = data.co2_1;
                document.getElementById('H2SMudPondVal').innerText = data.gas;

                // // Update charts if necessary
                // chart.data.datasets[0].data = data.chart1Data; // Update with your actual data source
                // chart.update();
                // chart1.data.datasets[0].data = data.chart2Data; // Update with your actual data source
                // chart1.update();
                
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch data every 10 seconds
    setInterval(fetchData, 10000);

    // Initial fetch
    fetchData();
});
