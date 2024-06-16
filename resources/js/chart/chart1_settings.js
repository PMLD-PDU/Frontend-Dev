 // Sample data for demonstration
 import { data } from '../dashboard';
 const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
 const latestData = data[data.length - 1];
 console.log(latestData);
 const test = latestData['wob'];
 const data = {
    labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5',  'Label 6',  'Label 7',  'Label 8',  'Label 9', 'Label 10'],
    datasets: [
        {
            label: 'Line 1',
            data: [test, 20, 15, 25, 30, 10, 20, 15, 25, 30],
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

 