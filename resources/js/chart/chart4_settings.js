 // Sample data for demonstration
const labels = [];
const value_1 = [];
const value_2 = [];
const value_3 = [];
const value_4 = [];

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
        value_2.splice(0, 1);
        value_3.splice(0, 1);
        value_4.splice(0, 1);
        labels.splice(0, 1);

        value_1.push(value['h2s_1']);
        value_2.push(value['mudflowoutp']);
        value_3.push(value['totspm']);
        value_4.push(value['sppress']);

        let waktu = jam + ':' + menit + ':' + detik;
        labels.push(waktu);

    } else {
        // let count = datas;
        for (let i = 1; i <= 10; i++) {

            let count = datas[datas.length - i];

            value_1.push(count['h2s_1']);
            value_2.push(count['mudflowoutp']);
            value_3.push(count['totspm']);
            value_4.push(count['sppress']);
        
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
           label: 'h2s_1',
           data: value_1,
           borderColor: 'rgb(75, 192, 192)',
           backgroundColor: 'rgba(75, 192, 192, 0.2)',
           borderWidth: 1
       },
       {
           label: 'mudflowoutp',
           data: value_2,
           borderColor: 'rgb(255, 99, 132)',
           backgroundColor: 'rgba(255, 99, 132, 0.2)',
           borderWidth: 1
       },
       {
           label: 'totspm',
           data: value_3,
           borderColor: 'rgb(54, 162, 235)',
           backgroundColor: 'rgba(54, 162, 235, 0.2)',
           borderWidth: 1
       },
       {
           label: 'sppress',
           data: value_4,
           borderColor: 'rgb(195, 58, 200)',
           backgroundColor: 'rgba(195, 58, 200, 0.2)',
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
const ctx = document.getElementById('chart4').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});

 