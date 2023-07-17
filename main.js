var randomScalingFactor = function () {
    return invalue = Number(document.getElementById("invalue").value);
  };
  
  var randomScalingFactor2 = function () {
    return invalue2 = Number(document.getElementById("invalue2").value);
  };
  var randomColorFactor = function () {
    return Math.round(Math.random() * 255);
  };
  
  var barColors = ["green", "red"];
  
  var barChartData = {
    labels: ["Bajarilgan vazifalar", "Bajarilmagan vazifalar"],
    datasets: [
      {
        backgroundColor: barColors,
        data: [
          randomScalingFactor(),
          randomScalingFactor2(),
        ],
        borderColor: "white",
        borderWidth: 2,
      }  
    ],
  };
  var myBar = null;
  window.onload = function () {
    var ctx = document.getElementById("canvas").getContext("2d");
    myBar = new Chart(ctx, {
      type: "doughnut",
      data: barChartData,
      options: {
        responsive: true,
      },
    });
  };
  
  $("#randomizeData").click(function () {
    $.each(barChartData.datasets, function (i, dataset) {
      dataset.data = [
        randomScalingFactor(),
        randomScalingFactor2(),
      ];
    });
    myBar.update();
  });