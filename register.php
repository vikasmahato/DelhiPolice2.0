<?php include ("includes/header.php");?>
<?php 
 $sql1 = mysqli_query($con,"SELECT * FROM register WHERE diaryType='Individual' ORDER BY timestamp DESC");
$sql2 = mysqli_query($con,"SELECT * FROM register WHERE diaryType='Hospital' ORDER BY timestamp DESC");

$num_ind = mysqli_num_rows($sql1);
$num_hosp = mysqli_num_rows($sql2);
?>
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
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New <br>Register Entry</span>
                 <a href="new_register.php" class="btn btn-sm btn-danger btn-flat pull-left">ADD</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
            
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hospital App.<br>this month</span>
              <span class="info-box-number"><?php echo  $num_hosp; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Individual App.<br>this month</span>
              <span class="info-box-number"><?php echo  $num_ind; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-arrow-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">View Statistics</span>
                 <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#launch_query">
  View
</button>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
            </div>
      <!-- /.row -->
   
         <div class=" nav-tabs-custom">
   <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Individual</a></li>
    <li><a data-toggle="tab" href="#menu2">Hospital</a></li>
  </ul>
        
<div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <h3>Individual</h3>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Applications</h3>
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
               $sno1 = 0;
                while($result = mysqli_fetch_array($sql1))
                { $sno1++;
                ?>
                <tr><td><?php echo $sno1; ?></td>
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
      
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
   
        <!-- /.col -->
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
            <h3>Hospital</h3>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Applications</h3>
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
                while($result1 = mysqli_fetch_array($sql2))
                {
                ?>
                <tr>
                    <tr><td><?php echo $sno1; ?></td>
                       <td>
                      <?php echo $result1['diaryNo']."/".$result1['diaryType']."/Gen Br./SED/Dated/".$result1['diaryDate']; ?>    
                    </td>  
                    
                    
                  <td><?php echo $result1['rank']." ".$result1['applicantName']." No.".$result1['idNo']; ?></td>
                     <td><?php echo $result1['treatment_by'] ?></td>
                    <td><?php echo $result1['type'] ?></td>
                <td><a class="btn btn-block btn-default" href="viewregister.php?id=<?php echo $result1['s_no']; ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                <?php 
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
      
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
   
        <!-- /.col -->
      </div>
    </div>
    
      <!-- Modal -->
<div class="modal fade" id="launch_query" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Please Select</h4>
      </div>
      <div class="modal-body">
        <form action="show_query.php" method="post">
           <select class="custom-select form-control" name="month" required >
               <option value="" selected disabled>Please select</option>
               <option value="01">January</option>
               <option value="02">Februrary</option>
               <option value="03">March</option>
               <option value="04">April</option>
               <option value="05">May</option>
               <option value="06">June</option>
               <option value="07">July</option>
               <option value="08">August</option>
               <option value="09">September</option>
               <option value="10">October</option>
               <option value="11">November</option>
               <option value="12">December</option>
            </select>
          <select class="custom-select form-control" name="diaryType" required >
              <option value="" selected disabled>Please select</option>
            <option value="Hospital">Hospital</option>
             <option value="Individual">Individual</option>
                    </select>
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
          
          </form>
    </div>
  </div>
</div>
            
        </div>
            
        </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include ("includes/footer.php"); ?>