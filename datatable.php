<html lang="en">
    
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absen</title>
    <!-- base:css -->
    <link rel="stylesheet" href="./css/Custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./images/favicon.png" />
  <title>How to use Tabledit plugin with jQuery Datatable in PHP Ajax</title>
</head>
 
<body>
    <div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <?php include('./partials/_sidebar.html') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
      <?php include('./partials/_navbar.html') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Data</h4>
                    <div class="table-responsive">
                        <table id="sample_data" class="table table-hover">
                        <thead>
                            <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Serial Number
                            </th>
                            <th>
                                Gender
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Waktu Masuk
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td data-edit-type="time"></td>
                          </tr>
                        </tbody>
                        </table>
                        <span class="glyphicon glyphicon-pencil"></span>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include('./partials/_footer.html'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js --> 
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <!-- End plugin js for this page-->
  <!-- Keperluan dataTable -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/jquery.tabledit.js"></script>
    <script src="./js/Custom.js"></script>
    
        
  <!-- End custom js for this page-->
</body>

</html>

  <script type="text/javascript" language="javascript" >
  $(document).ready(function(){
  
   var dataTable = $('#sample_data').DataTable({
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"pages/Manajemen_User/tabel_fetch.php",
     type:"POST"
    }
   });
  
   $('#sample_data').on('draw.dt', function(){
    $('#sample_data').Tabledit({
     url:'pages/Manajemen_User/tabel_action.php',
     dataType:'json',
     columns:{
      identifier : [0, 'id'],
      editable:[[1, 'username'], [2, 'serialnumber'], [3, 'gender', '{"Male":"Laki-Laki","Female":"Perempuan"}'], [4, 'email'], [5, 'time_in']]
     },
     restoreButton:false,
     onSuccess:function(data, textStatus, jqXHR)
     {
      if(data.action == 'delete')
      {
       $('#' + data.id).remove();
       $('#sample_data').DataTable().ajax.reload();
      }
     }
    });
   });
    
  });
  </script>