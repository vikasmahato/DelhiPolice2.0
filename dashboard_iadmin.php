<?php
session_start();
if($_SESSION["sess_userrole"]!="iadmin"){
    header ("Location: index.php");
}
?>
<?php include ("includes/header.php");?>
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
              <h3 class="box-title">Latest Orders</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
              <table id="godown" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Details</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = mysqli_query($con,"SELECT * FROM form WHERE status = 'I_ADMIN'");
                while($result = mysqli_fetch_array($sql))
                {
                ?>
                <tr>
                       <td>
                           <?php if($result['status'] == 'HAG') { ?>
                           <span class="label label-default">HAG</span>
                           <?php } elseif($result['status'] == 'I_ADMIN') { ?>
                           <span class="label label-warning">Ins. Admin</span>
                           <?php } elseif($result['status'] == 'ACP') {?>
                            <span class="label label-info">ACP</span>
                           <?php } elseif($result['status'] == 'DCP') {?>
                            <span class="label label-primary">DCP</span>
                            <?php } elseif($result['status'] == 'REEVAL_HAG') {?>
                            <span class="label label-default">Re. HAG</span>
                            <?php } elseif($result['status'] == 'REEVAL_ACP') {?>
                            <span class="label label-info">Re. ACP</span>
                            <?php } elseif($result['status'] == 'REEVAL_IADMIN') {?>
                            <span class="label label-warning">Re. Ins. Admin</span>
                            <?php } elseif($result['status'] == 'D_HAND') {?>
                            <span class="label label-default">D. Hand</span>
                            <?php } elseif($result['status'] == 'PHQ') {?>
                            <span class="label label-default">PHQ</span>
                            <?php } elseif($result['status'] == 'APPROVED') {?>
                            <span class="label label-success">Approved</span>
                           <?php } elseif($result['status'] == 'FAILED') {?>
                            <span class="label label-danger">Rejected</span>
                           <?php } ?>
                    </td>  
                    
                    
                  <td><?php echo $result['rank']." ".$result['applicant_name'] ?></td>
                     <td><?php echo $result['application_date'] ?></td>
                <td><a class="btn btn-block btn-default" href="viewclaim.php?id=<?php echo $result['app_id']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Date</th>
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