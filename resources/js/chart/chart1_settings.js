const labels = [];
const value_1 = [];
const value_2 = [];
const value_3 = [];
const value_4 = [];
const value_5 = [];
const value_6 = [];
const value_7 = [];

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
        value_5.splice(0, 1);
        value_6.splice(0, 1);
        value_7.splice(0, 1);
        labels.splice(0, 1);

        value_1.push(value['torque']);
        value_2.push(value['blockpos']);
        value_3.push(value['ropin']);
        value_4.push(value['']);
        value_5.push(value['wob']);
        value_6.push(value['']);
        value_7.push(value['']);

        let waktu = jam + ':' + menit + ':' + detik;
        labels.push(waktu);

    } else {
        // let count = datas;
        for (let i = 1; i <= 10; i++) {

            let count = datas[datas.length - i];

            value_1.unshift(count['torque']);
            value_2.unshift(count['blockpos']);
            value_3.unshift(count['ropin']);
            value_4.unshift(count['']);
            value_5.unshift(count['wob']);
            value_6.unshift(count['']);
            value_7.unshift(count['']);

        
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
            
            if (menit < 10 && menit > 0) {
                if (menit.toString().length < 2) {
                    menit = '0' + menit.toString();
                }
            }
            
            
            let waktu = jam + ':' + menit + ':' + detik;
            labels.unshift(waktu);
        }
    }

    myChart.update();

});

const data = {
   labels: labels,
   datasets: [
       {
           label: 'TORQ',
           data: value_1,
           borderColor: 'rgb(75, 192, 192)',
           backgroundColor: 'rgba(75, 192, 192, 0.2)',
           borderWidth: 1
       },
       {
           label: 'Block Position',
           data: value_2,
           borderColor: 'rgb(255, 99, 132)',
           backgroundColor: 'rgba(255, 99, 132, 0.2)',
           borderWidth: 1
       },
       {
           label: 'ROPi',
           data: value_3,
           borderColor: 'rgb(54, 162, 235)',
           backgroundColor: 'rgba(54, 162, 235, 0.2)',
           borderWidth: 1
       },
       {
           label: 'ROP',
           data: value_4,
           borderColor: 'rgb(195, 58, 200)',
           backgroundColor: 'rgba(195, 58, 200, 0.2)',
           borderWidth: 1
       },
       {
          label: 'WOB',
          data: value_5,
          backgroundColor: 'rgba(255, 140, 0, 0.2)',
          borderColor: 'rgb(255, 140, 0)',
          borderWidth: 1
        },
        {
          label: 'Hookload',
          data: value_6,
          backgroundColor: 'rgba(0, 255, 255, 0.2)',
          borderColor: 'rgb(0, 255, 255)',
          borderWidth: 1
        },
        {
          label: 'rpm',
          data: value_7,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgb(255, 140, 0)',
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
            text: 'Graph 1'
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