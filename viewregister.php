<?php include("includes/header.php"); ?>
<?php 
$sql = mysqli_query($con, "SELECT * FROM register WHERE s_no = '".$_GET['id']."'");
$result = mysqli_fetch_array($sql);
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
        <form class="form-horizontal" role="form" method="post" action="update_register.php">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
	          <h3 class="box-title">
	            Diary Number <?php echo $result['diaryNo']."/".$result['diaryType']." /Genl. Branch/SED dated/".$result['diaryDate']; ?>
	          </h3>
        	</div>
        <!-- /.col -->
            <div class="box-body">
	          
	          <blockquote>
	          <strong>Rank and Name: </strong>
	           <?php echo $result['rank']." ".$result['applicantName']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>PIS:
	            </strong><?php echo $result['pis']; ?>
	          </blockquote>
	          
	          <blockquote>
	          <strong>Belt No:
	            </strong><?php echo $result['idNo']; ?>
	          </blockquote>
	   
              <blockquote>
	          <strong>Treatment Taken By:
	            </strong><?php echo $result['treatment_by']; ?>
	          </blockquote>
                
                <blockquote>
	          <strong>Case Type:
	            </strong><?php echo $result['type']; ?>
	          </blockquote>
                
                <blockquote>
	          <strong>Hospital Name:
	            </strong><?php echo $result['hospitalName']; ?>
	          </blockquote>
                
                <blockquote>
	          <strong>aAmount Claimed:
	            </strong><?php echo $result['amt_claimed']; ?>
	          </blockquote>
	   
        	</div>
		    </div>
		  </div>

        <div class="col-md-6">
          <div class="box box-default">
        
        <!-- /.col -->
            <div class="box-body">
                
	            <blockquote>
	          <strong>Amount Admissible: </strong>
	           <input type="number" class="form-control" id="basic-url" name="admis_amt" value="<?php echo $result['admis_amt']; ?>">
	          </blockquote>
	          
                
                 <blockquote>
	          <strong>Send To: </strong>
	           <select class="custom-select form-control" name="send_to">
                <option value="" selected disabled>Please select</option>
                <option value="Account Br.">Account Br.</option>
                <option value="PHQ">PHQ</option>
               </select>
	          </blockquote>
                
                 <blockquote>
	          <strong>Number: </strong>
                <input type="number" class="form-control" id="basic-url" name="number" value="<?php echo $result['number']; ?>">
	           </blockquote>
                    
                <blockquote>
	          <strong>Date: </strong>
                <input type="text" class="form-control" id="datepicker" name="date" value="<?php echo $result['date']; ?>">
	           </blockquote>
	          
                <blockquote>
	          <strong>Sanction No: </strong>
                <input type="number" class="form-control" id="basic-url" name="sanction_no" value="<?php echo $result['sanction_no']; ?>">
	           </blockquote>    
                    
        	</div>
		    </div>
		  </div>
              <input type="hidden"  value="<?php echo $result['s_no']; ?>" name="id" />
    
        
        <div class="col-md-6">
        
          <?php if ($_SESSION['sess_userrole']=="dealinghand"){ ?>
    <button type="submit" class="btn btn-success btn-lg btn-block col-md-6" >Update</button>
    
    <?php
      }
    ?>
      

		</div>
          </form>
        </div>
    </section>

    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>