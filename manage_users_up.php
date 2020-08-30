<table class="table table-hover">
  <thead class="text-center">
     <tr>
      <th></th>
     <th>ID Sidik Jari</th>
     <th>Nama</th>
     <th>J.Kelamin</th>
     <th>S.No</th>
     <th>Tanggal</th>
     <th>Waktu Masuk</th>
     </tr>
  </thead>
<tbody class="text-center">
<?php
  //Connect to database
  require('./connectDB.php');

    $sql = "SELECT * FROM users WHERE del_fingerid=0 ORDER BY id DESC";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo '<p class="error">SQL Error</p>';
    }
    else{
      mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
      if (mysqli_num_rows($resultl) > 0){
          while ($row = mysqli_fetch_assoc($resultl)){
  ?>
              <TR>
              	<TD><?php  
                		if ($row['fingerprint_select'] == 1) {
                			echo "<svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-check2-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'> <path fill-rule='evenodd' d='M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z'/> <path fill-rule='evenodd' d='M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z'/> </svg>";                    
                    }
                  ?>
              	</TD>
                <TD>
                	<form>
                    <?php $fingerid = $row['fingerprint_id'];?>
                    
                		<button type="button" class="btn btn-info btn-rounded" id="<?php echo $fingerid;?>" title="select this UID"><?php echo $fingerid;?></button>
                	</form>
                </TD>
              <TD><?php echo $row['username'];?></TD>
              <TD><?php echo $row['gender'];?></TD>
              <TD><?php echo $row['serialnumber'];?></TD>
              <TD><?php echo $row['user_date'];?></TD>
              <TD><?php echo $row['time_in'];?></TD>
              </TR>
<?php
        }   
    }
  }
?>
</tbody>
</table>