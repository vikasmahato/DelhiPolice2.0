<?php include("includes/header.php"); ?>
<?php 
$sql = mysqli_query($con, "SELECT * FROM form WHERE app_id = '".$_GET['id']."'");
$result = mysqli_fetch_array($sql);
$item = explode(",",$result['items']);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Application
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Applications</a></li>
        <li class="active">View</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- title row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Diary Number <?php echo $result['diary_no']." /Genl. Branch/SED dated ".$result['diary_date']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">
	          
	          <blockquote>
	          <strong>Rank and Name: </strong>
	           <?php echo $result['rank']." ".$result['applicant_name']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>PIS:
	            </strong><?php echo $result['pis']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>Belt No:
	            </strong><?php echo $result['police_station_no']; ?>
	          </blockquote>
	   
        	</div>
		    </div>
		  </div>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Order Number <?php echo $_GET['id']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">
	            <blockquote>
	          <strong>Application Date: </strong>
	           <?php echo $result['application_date']; ?>
	          </blockquote>
	          
                
                 <blockquote>
	          <strong>Applicant CGHS No: </strong>
	           <?php echo $result['a_cghs_no']; ?>
	          </blockquote>
                
                 <blockquote>
	          <strong>Category: </strong>
	           <?php echo $result['a_cghs_category']; ?>
	          </blockquote>
	          
        	</div>
		    </div>
		  </div>
          <form action="createpdf.php" method="post">
              <input type="hidden"  value="<?php echo $result['app_id']; ?>" name="id"></input>
          <?php switch($result['claim_type']){
            //permission treatment
            case 'PERMISSION': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form12_btn'>Notesheet</button></div>
                <div class='col-md-3'><button type='submit' class='btn btn-info'name='form13_btn'>Permission</button></div>
          <?php 
            break; //permision credit
            case 'CREDIT': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form10_btn'>Notesheet</button></div>
                <div class='col-md-3'><button type='submit' class='btn btn-info'name='form1_btn'>Permission</button></div>
          <?php
            break;
            case 'OP_EMERGENCY': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form7_btn'>Permission</button></div>
                <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button></div>
                <div class='col-md-3'><button type='submit' class='btn btn-info'name='form9_btn'>Order</button></div>
          <?php
            break; 
            case 'OP_REFERRAL': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form2_btn'>Permission</button></div>
                <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button></div>
          <?php
            break;
            case 'IP_REFERRAL': ?>
          <?php
            break;
            }
          ?>
          </form>
		  <div class="col-md-6">
		  	<?php
		  	if($result['status'] == 0) {
		  	?>
		  	<a href = "finishedsuccess.php?id=<?php $_GET['id']; ?>"><button type="button" class="btn btn-block btn-success btn-lg">Approve</button></a>
		  	<?php } else { ?>
		  	<button type="button" class="btn btn-block btn-success btn-lg disabled">Approve</button>
		  	<?php } ?>
		  </div>
		</div>

    </section>
    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>