 // Sample data for demonstration
 const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
 const data = {
     labels: labels,
     datasets: [{
         label: 'My First Dataset',
         backgroundColor: 'rgb(255, 99, 132)',
         borderColor: 'rgb(255, 99, 132)',
         data: [0, 10, 5, 2, 20, 30],
     }]
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
     }
 };

 // Create the chart
 const ctx = document.getElementById('chart1').getContext('2d');
 const myChart = new Chart(ctx, {
     type: 'line',
     data: data,
     options: options
 });

 