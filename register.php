<?php include ("includes/header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Register
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Register</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New Register Entry</span>
                 <a href="new_register.php" class="btn btn-sm btn-danger btn-flat pull-left">ADD</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Applications</h3>
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
                $sql = mysqli_query($con,"SELECT * FROM register");
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