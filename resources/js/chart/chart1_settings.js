 // Sample data for demonstration
const labels = [];
const value_1 = [];
document.addEventListener('latestDataUpdated', function(event) {
    const datas = event.detail;
    
    let now = new Date();
    let jam = String(now.getHours()).padStart(2, '0');
    let menit = String(now.getMinutes()).padStart(2, '0');
    let detik = String(now.getSeconds()).padStart(2, '0');

    const value = datas[datas.length - 1];
    // console.log(value);
    
    
    if (value_1.length == 10) {
        value_1.splice(0, 1);
        labels.splice(0, 1);

        value_1.push(value['bitdepth']);

        let waktu = jam + ':' + menit + ':' + detik;
        labels.push(waktu);

    } else {
        // let count = datas;
        for (let i = 1; i <= 10; i++) {
            let count = datas[datas.length - i];
            value_1.push(count['bitdepth']);
        
            // detik
            if (detik - 10 < 0) {

                menit--;
                let min = Math.abs(detik - 10)
                detik = 60 - min;

            } else {

                detik -= 10;
                if (detik < 10) {
                    detik = '0' + detik.toString();
                }
            }

            // menit
            if (menit < 0) {

                menit = 60;
                jam--;
            } 

            if (menit < 10) {
                menit = '0' + menit.toString();
            }
            
            let waktu = jam + ':' + menit + ':' + detik;
            labels.push(waktu);
        }
    }

    myChart.update();

});

const data = {
   labels: labels,
   datasets: [
       {
           label: 'bit depth',
           data: value_1,
           borderColor: 'rgb(75, 192, 192)',
           backgroundColor: 'rgba(75, 192, 192, 0.2)',
           borderWidth: 1
       },
       {
           label: 'Line 2',
           data: [5, 15, 10, 20, 25],
           borderColor: 'rgb(255, 99, 132)',
           backgroundColor: 'rgba(255, 99, 132, 0.2)',
           borderWidth: 1
       },
       {
           label: 'Line 3',
           data: [8, 18, 12, 22, 27],
           borderColor: 'rgb(54, 162, 235)',
           backgroundColor: 'rgba(54, 162, 235, 0.2)',
           borderWidth: 1
       }
   ]
};


// Options for chart customization
const options = {
    indexAxis: 'y',
    responsive: true,
    plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Chart.js Line Chart'
        }
    },
    maintainAspectRatio: false,
};

// Create the chart
const ctx = document.getElementById('chart1').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});

 