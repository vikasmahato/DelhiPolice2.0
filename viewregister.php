<?php include("includes/header.php"); ?>
<?php 
$id=$_GET['id'];
$type=$_GET['type'];

$table = '';

if($type=='Individual'){
 $table='register';   
}elseif($type=='Hospital'){
 $table='register_hospital';   
}


$sql = mysqli_query($con, "SELECT * FROM $table WHERE s_no = $id");
$result = mysqli_fetch_array($sql);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Application <?php echo $result['s_no']; ?>
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
                <?php if($result['objection']==1){ ?>
	          <blockquote>
	          <strong>Under Objection </strong>
	          </blockquote>
                <?php } ?>
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
	          <strong>Amount Claimed: </strong>
	           <input type="number" class="form-control" id="basic-url" name="amt_claimed" value="<?php echo $result['amt_claimed']; ?>">
	          </blockquote>
	            <blockquote>
	          <strong>Amount Admissible: </strong>
	           <input type="number" class="form-control" id="basic-url" name="admis_amt" value="<?php echo $result['admis_amt']; ?>">
	          </blockquote>
                
	           <blockquote>
	          <strong>Send to PHQ: </strong>
	           <input type="number" class="form-control" id="basic-url" name="phq_number" value="<?php echo $result['number']; ?>">
	          </blockquote>
                
                

                <blockquote>
	          <strong>Date: </strong>
                <input type="text" class="form-control" id="datepicker" name="date" value="<?php echo $result['date']; ?>">
	           </blockquote>
	          
                <blockquote>
	          <strong>Sanction No: </strong>
                <input type="number" class="form-control" id="basic-url" name="sanction_no" value="<?php echo $result['sanction_no']; ?>">
	           </blockquote>    
                  <blockquote>
                 <label for="date">Sanction Date</label>
               <input type="text" class="form-control" id="datepicker" name="sanction_date" placeholder="Date" value="<?php echo $result['sanction_date']; ?>">
                </blockquote>
                    
        	</div>
		    </div>
		  </div>
              <input type="hidden"  value="<?php echo $result['s_no']; ?>" name="id" />
    <input type="hidden"  value="<?php echo $result['diaryType']; ?>" name="diaryType" />
        <div class="row">
        <div class="col-md-6">
        
          <?php if ($_SESSION['sess_userrole']=="dealinghand"){ ?>
    <button type="submit" class="btn btn-success btn-lg btn-block col-md-6">Update</button>
            
    
    <?php
      }
    ?>
      

		</div>
          </form>
          
          <div class="col-md-6">
              
           <?php if ($_SESSION['sess_userrole']=="dealinghand"){ ?>
          <form action="addObjection.php" method="post">
              <?php if($result['objection']==0){ ?>
                <input type="hidden" value="1" name="objection">
                 <input type="hidden"  value="<?php echo $result['s_no']; ?>" name="id" />
               <input type="hidden"  value="<?php echo $result['diaryType']; ?>" name="diaryType" />
                <button type="submit" class="btn btn-danger btn-lg btn-block col-md-6" >Objection</button>
              <?php } else { ?> 
               <input type="hidden" value="0" name="objection">
                 <input type="hidden"  value="<?php echo $result['s_no']; ?>" name="id" />
              <input type="hidden"  value="<?php echo $result['diaryType']; ?>" name="diaryType" />
                <button type="submit" class="btn btn-danger btn-lg btn-block col-md-6" >Remove Objection</button>
              <?php } ?>
                </form>

                <form action="referral.php" method ="post">
                <input type="hidden"  value="<?php echo $result['s_no']; ?>" name="id" />
                <input type="hidden" name="table" value="<?php echo $table; ?>" />
                <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" >Referral</button>
                </form>

           <?php
      }
    ?>
          </div>
            </div>
        </div>
    </section>

    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>