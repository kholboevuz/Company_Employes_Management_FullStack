

// Initialize the chart with empty data
const initialData = {
  labels: [],
  datasets: [{
    data: [],
    backgroundColor: [],
    borderColor: [],
    borderWidth: 1,
  }],
};

const options = {
  responsive: true,
  maintainAspectRatio: false,
};

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
  type: 'pie',
  data: initialData,
  options: options,
});

// Function to update the chart with new data
function updateChart(labels, data, colors) {
  myChart.data.labels = labels;
  myChart.data.datasets[0].data = data;
  myChart.data.datasets[0].backgroundColor = colors;
  myChart.update();
}
const red = 10;
const green = 90;
const newDataLabels = ['Bajarilgan ishlar', 'Bajarilmagan ishlar'];
const newData = [red , green];
const newColors = ['red', 'green'];
updateChart(newDataLabels, newData, newColors);