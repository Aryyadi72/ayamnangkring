"use strict";
document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    floatchart();
  }, 500);
});

function floatchart() {
  (function () {
    var options = {
      chart: {
        type: "line",
        height: 90,
        sparkline: {
          enabled: true,
        },
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#FFF"],
      stroke: {
        curve: "smooth",
        width: 3,
      },
      series: [
        {
          name: "series1",
          data: [45, 66, 41, 89, 25, 44, 9, 54],
        },
      ],
      yaxis: {
        min: 5,
        max: 95,
      },
      tooltip: {
        theme: "dark",
        fixed: {
          enabled: false,
        },
        x: {
          show: false,
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return "Total Earning";
            },
          },
        },
        marker: {
          show: false,
        },
      },
    };
    var chart = new ApexCharts(document.querySelector("#tab-chart-1"), options);
    chart.render();
  })();
  (function () {
    var options = {
      chart: {
        type: "line",
        height: 90,
        sparkline: {
          enabled: true,
        },
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#FFF"],
      stroke: {
        curve: "smooth",
        width: 3,
      },
      series: [
        {
          name: "series1",
          data: [35, 44, 9, 54, 45, 66, 41, 69],
        },
      ],
      yaxis: {
        min: 5,
        max: 95,
      },
      tooltip: {
        theme: "dark",
        fixed: {
          enabled: false,
        },
        x: {
          show: false,
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return "Total Earning";
            },
          },
        },
        marker: {
          show: false,
        },
      },
    };
    var chart = new ApexCharts(document.querySelector("#tab-chart-2"), options);
    chart.render();
  })();
  (function () {
    var options = {
      chart: {
        type: "bar",
        height: 480,
        stacked: true,
        toolbar: {
          show: false,
        },
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "50%",
        },
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#d3eafd", "#2196f3", "#673ab7", "#e1d8f1"],
      series: [
        {
          name: "Investment",
          data: [35, 125, 35, 35, 35, 80, 35, 20, 35, 45, 15, 75],
        },
        {
          name: "Loss",
          data: [35, 15, 15, 35, 65, 40, 80, 25, 15, 85, 25, 75],
        },
        {
          name: "Profit",
          data: [35, 145, 35, 35, 20, 105, 100, 10, 65, 45, 30, 10],
        },
        {
          name: "Maintenance",
          data: [0, 0, 75, 0, 0, 115, 0, 0, 0, 0, 150, 0],
        },
      ],
      responsive: [
        {
          breakpoint: 480,
          options: {
            legend: {
              position: "bottom",
              offsetX: -10,
              offsetY: 0,
            },
          },
        },
      ],
      xaxis: {
        type: "category",
        categories: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
      },
      grid: {
        strokeDashArray: 4,
      },
      tooltip: {
        theme: "dark",
      },
    };
    var chart = new ApexCharts(document.querySelector("#growthchart"), options);
    chart.render();
  })();
  (function () {
    var options = {
      chart: {
        type: "area",
        height: 95,
        stacked: true,
        sparkline: {
          enabled: true,
        },
      },
      colors: ["#673ab7"],
      stroke: {
        curve: "smooth",
        width: 1,
      },
      series: [
        {
          data: [0, 15, 10, 50, 30, 40, 25],
        },
      ],
    };
    var chart = new ApexCharts(document.querySelector("#bajajchart"), options);
    chart.render();
  })();
  (function () {
    var options = {
      series: [
        {
          name: "Income",
          data: [10, 41, 35, 51, 49, 62, 69, 91, 148],
        },
      ],
      chart: {
        height: 350,
        type: "line",
        zoom: {
          enabled: false,
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "straight",
      },
      title: {
        text: "Data Income",
        align: "center",
      },
      grid: {
        row: {
          colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
          opacity: 0.5,
        },
      },
      xaxis: {
        categories: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
        ],
      },
    };

    var chart = new ApexCharts(document.querySelector("#line-chart"), options);
    chart.render();
  })();
  (function () {
    var options = {
      series: [
        {
          name: "Per Produk yang Terjual",
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
        },
        {
          name: "Bahan Baku Tersedia",
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
        },
      ],
      chart: {
        type: "bar",
        height: 350,
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "55%",
          endingShape: "rounded",
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
      },
      xaxis: {
        categories: [
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
        ],
      },
      yaxis: {
        title: {
          text: "",
        },
      },
      fill: {
        opacity: 1,
        colors: ["#4e2c9e", "#147ce3"],
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "$ " + val + " thousands";
          },
        },
      },
    };

    var chart = new ApexCharts(
      document.querySelector("#column-chart"),
      options
    );
    chart.render();
  })();
  (function () {
    var options = {
      series: [
        {
          name: "Revenue",
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
        },
        {
          name: "Free Cash Flow",
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
        },
      ],
      chart: {
        type: "bar",
        height: 350,
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "55%",
          endingShape: "rounded",
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
      },
      xaxis: {
        categories: [
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
        ],
      },
      yaxis: {
        title: {
          text: "",
        },
      },
      fill: {
        opacity: 1,
        colors: ["#095291", "#f0ba07"],
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "$ " + val + " thousands";
          },
        },
      },
    };

    var chart = new ApexCharts(
      document.querySelector("#column-chart-1"),
      options
    );
    chart.render();
  })();
}
