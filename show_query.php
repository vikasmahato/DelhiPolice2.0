<?php include ("includes/header.php");?>
<?php 
$month = $_POST['month'];
$diaryType = $_POST['diaryType'];

if($diaryType=='Individual'){
    $query = "SELECT * 
        FROM register
        WHERE Year(timestamp) = Year(CURRENT_TIMESTAMP) 
        AND Month(timestamp) = $month
        AND diaryType = 'Individual' ORDER BY timestamp DESC";
} elseif($diaryType=='Hospital'){
    $query = "SELECT * 
        FROM register_hospital
        WHERE Year(timestamp) = Year(CURRENT_TIMESTAMP) 
        AND Month(timestamp) = $month
        AND diaryType = 'Hospital' ORDER BY timestamp DESC";
}



$sql = mysqli_query($con,$query);

$num = mysqli_num_rows($sql);
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
 <br>
          <form method="post" action="print_register.php" >
              <input type="hidden" name="month" value="<?php echo $month; ?>">
              <input type="hidden" name="diaryType" value="<?php echo $diaryType; ?>">
           <button type="submit" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
          </form>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Results</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                    <table id="godown" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S No</th>
                  <th>Diary No</th>
                  <th>Rank/Name/No</th>
                  <th>Treatment Taken By</th>
                    <th>Type</th>
                  <th>Details</th>
                </tr>
                </thead>
                <tbody>
                <?php
               
                while($result = mysqli_fetch_array($sql))
                {
                ?>
                <tr>
                    <td><?php echo $num; ?></td>
                       <td>
                      <?php echo $result['diaryNo']."/".$result['diaryType']."/Gen Br./SED/Dated/".$result['diaryDate']; ?>    
                    </td>  
                    
                    
                  <td><?php echo $result['rank']." ".$result['applicantName']." No.".$result['idNo']; ?></td>
                     <td><?php echo $result['treatment_by'] ?></td>
                    <td><?php echo $result['type'] ?></td>
                <td><a class="btn btn-block btn-default" target="_blank" href="viewregister.php?id=<?php echo $result['s_no']; ?>&type=<?php echo $result['diaryType']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
                    $num--;
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>S No</th>
                    <th>Diary No</th>
                  <th>Rank/Name/No</th>
                  <th>Treatment Taken By</th>
                    <th>Type</th>
                  <th>Details</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include ("includes/footer.php"); ?>
