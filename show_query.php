<?php include ("includes/header.php");?>
<?php 
$month = $_POST['month'];
$diaryType = $_POST['diaryType'];

if($diaryType=='Individual'){
    $query = "SELECT * 
        FROM register
        WHERE Year(timestamp) = Year(CURRENT_TIMESTAMP) 
        AND Month(timestamp) = $month
        AND diaryType = 'Individual'";
} elseif($diaryType=='Hospital'){
    $query = "SELECT * 
        FROM register_hospital
        WHERE Year(timestamp) = Year(CURRENT_TIMESTAMP) 
        AND Month(timestamp) = $month
        AND diaryType = 'Hospital'";
}



$sql = mysqli_query($con,$query);
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
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
                       <td>
                      <?php echo $result['diaryNo']."/".$result['diaryType']."/Gen Br./SED/Dated/".$result['diaryDate']; ?>    
                    </td>  
                    
                    
                  <td><?php echo $result['rank']." ".$result['applicantName']." No.".$result['idNo']; ?></td>
                     <td><?php echo $result['treatment_by'] ?></td>
                    <td><?php echo $result['type'] ?></td>
                <td><a class="btn btn-block btn-default" href="viewregister.php?id=<?php echo $result['s_no']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
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