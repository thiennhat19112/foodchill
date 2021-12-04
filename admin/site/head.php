<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../assets/images/fav.png" type="image/x-icon">
  <title>FoodChill Dashboard</title>
  <!-- datatables css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" />
  <link rel="stylesheet" href="assets/css/formCss/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tailwind.output.css" />
  <link rel="stylesheet" href="assets/css/dropify.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script src="assets/js/charts-bars.js" defer></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.myTable').DataTable({
        "language": {
          "lengthMenu": "Hiển thị _MENU_ trên trang",
          "zeroRecords": "Không tìm thấy dữ liệu!",
          "info": "Đang hiện trang _PAGE_ / _PAGES_",
          "infoEmpty": "Không tìm thấy dữ liệu!",
          "infoFiltered": "(lọc từ _MAX_ hồ sơ)",
          "search": "Tìm kiếm:",
          "paginate": {
            "first": "Trang đầu",
            "last": "Trang cuối",
            "next": "Trước",
            "previous": "Sau"
          },
        }
      });
    });
  </script>
</head>