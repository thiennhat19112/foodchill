/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */

$(document).ready(function () {
  $.ajax({
    url: 'http://localhost/pro1014/foodchill/admin/models/statistical.php',
    dataType: 'json',
    success: function (data) {
      console.log(data);
      var today = new Date()
      const barConfig = {
        type: 'bar',
        data: {
          labels: [
            (today.getDate() - 6) + '/' + (today.getMonth() + 1),
            (today.getDate() - 5) + '/' + (today.getMonth() + 1),
            (today.getDate() - 4) + '/' + (today.getMonth() + 1),
            (today.getDate() - 3) + '/' + (today.getMonth() + 1),
            (today.getDate() - 2) + '/' + (today.getMonth() + 1),
            (today.getDate() - 1) + '/' + (today.getMonth() + 1),
            today.getDate() + '/' + (today.getMonth() + 1)
          ],
          datasets: [
            {
              label: 'Bags',
              backgroundColor: '#7e3af2',
              // borderColor: window.chartColors.blue,
              borderWidth: 1,
              data: [data['ngay 7'], data['ngay 6'], data['ngay 5'], data['ngay 4'], data['ngay 3'], data['ngay 2'], data['ngay 1']],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: false,
          },
        },
      }

      const barsCtx = document.getElementById('bars')
      window.myBar = new Chart(barsCtx, barConfig)
    }
  })
})

