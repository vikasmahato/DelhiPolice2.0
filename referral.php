<?php include("includes/header.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       New Referral/Govt. Claim 
       <?php if(isset($_POST)){
  $id = $_POST['id'];
  $table = $_POST['table'];
  $sql = mysqli_query($con, "SELECT * FROM $table WHERE s_no = $id");
  $result = mysqli_fetch_array($sql);
  print_r($_POST);
 // print_r($result);
  } ?>
  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Referral/Govt. Claim</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
	      <form role="form" method="post" action="add_referral.php" enctype="multipart/form-data">
              <div class="box-body">
                   <div class="form-group">
                  <label for="rank">Rank</label>
                   <select class="custom-select form-control" name="rank" required >
                         <option value="" selected disabled>Please select</option>
                         <option value="Cook">Cook</option>
                         <option value="MTS">MTS</option>
                         <option value="Constable">Constable</option>
                         <option value="W/Constable">W/Constable</option>
                         <option value="Head Constable">Head Constable</option>
                         <option value="W/Head Constable">W/Head Constable</option>
                         <option value="Assistant Sub-Inspector">Assistant Sub-Inspector</option>
                         <option value="W/Assistant Sub-Inspector">W/Assistant Sub-Inspector</option>
                         <option value="Sub-Inspector">Sub-Inspector</option>
                         <option value="W/Sub-Inspector">W/Sub-Inspector</option>
                         <option value="Inspector">Inspector</option>
                         <option value="W/Inspector">W/Inspector</option>
                         <option value="Assistant Commissioner of Police">Assistant Commissioner of Police</option>
                         <option value="Additional Deputy Commissioner of Police">Additional Deputy Commissioner of Police</option>
                         <option value="Deputy Commissioner of Police">Deputy Commissioner of Police</option>
                    </select>
                </div>
                  
              	<div class="form-group">
                  <label for="applicantName">Applicant Name</label>
                 <input type="text" class="form-control" id="basic-url" name="applicantName" placeholder="Applicant Name" value="<?php echo $result['applicantName']; ?>" required >
                </div>
                <div class="form-group">
                  <label for="idNo">Belt No</label>
                  <input type="text" class="form-control" id="basic-url" name="idNo" placeholder="Belt No" value="<?php echo $result['idNo']; ?>" required >
                </div>
                <div class="form-group">
                  <label for="pis">PIS No</label>
                  <input type="text" class="form-control" id="basic-url" name="pis" placeholder="PIS No" value="<?php echo $result['pis']; ?>"required >
                </div>
               
                <div class="form-group">
                  <label for="claimCheck">Treatment of Self or Relative:</label>
                  <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="self" onclick="hide()">
                    SELF
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="relative" onclick="show()">
                    RELATIVE
                </label>
              </div>
           </div>
                </div>
                
                   <div class="form-group" id="dependent1">
                  <label for="relation">Enter relation with the CGHS holder</label>
                 <input type="text" class="form-control" id="basic-url" name="relation" placeholder="Relation" value="self" >
                </div>
                 
                  <div class="form-group" id="dependent5">
                  <label for="relation">Enter relative name</label>
                 <input type="text" class="form-control" id="basic-url" name="relativeName" placeholder="Relative Name" value="no name" >
                </div>
                  
                   <div class="form-group">
                  <label for="startDate endDate">Period of Treatment</label>
                       <span class="input-group-addon" id="periodTo">From</span>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="startDate" class="form-control pull-right" id="datepicker">
                </div>
                       <span class="input-group-addon" id="periodTo">To</span>
                     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="endDate" class="form-control pull-right" id="datepicker">
                </div>
                </div>
                  
                  
                      <div class="form-group">
                  <label for="refhospitalName">Enter Referring Hospital Name</label>
                 <input type="text" class="form-control" id="basic-url" name="refHospitalName" placeholder="Referring Hospital Name" required >
                </div>
                  
                      <div class="form-group">
                  <label for="hospitalName">Enter Hospital Name</label>
                 <input type="text" class="form-control" id="basic-url" name="hospitalName" placeholder="Hospital Name" value="<?php echo $result['hospitalName']; ?>" required >
                </div>
                  
                  
                  
                      <div class="form-group">
                  <span class="input-group-addon" id="basic-addon3">Enter Diary No:</span>
            <input type="text" class="form-control" id="diary" name="diaryNo" placeholder="Diary No" value = "<?php echo $result['diaryNo']; ?>" required >
            <span class="input-group-addon" id="dated">/Genl. Branch/SED dated</span>
            <input type="text" class="form-control" id="datepicker" name="diaryDate" value="<?php echo $result['diaryDate']; ?>" required >
                </div>
                  
                      <div class="form-group">
                  <label for="appCGHSno">Enter the CGHS card/ID No. of Applicant</label>
               <input type="number" class="form-control" id="basic-url" name="appCGHSno" placeholder="Applicant CGHS Number" required >
                </div>
                  
                     
                  
                   <div class="form-group">
                  <label for="appCGHSexp">Enter the expiry date of CGHS card of Applicant</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="appCGHSexp" class="form-control pull-right" id="datepicker" required>
                </div>
                </div>
                  
                      <div class="form-group" id="dependent2">
                  <label for="hospitalAddress">Enter the CGHS No of Dependent</label>
               <input type="text" class="form-control" id="basic-url" name="refCGHSno" placeholder="CGHS of dependennt" value="0000" >
                </div>
                  
                    <div class="form-group" id="dependent3">
                  <label for="refCGHSexp">Enter the expiry date of CGHS card of Dependent</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="refCGHSexp" class="form-control pull-right" id="datepicker" value="00-00-0000">
                </div>
                </div>
                    
                  
                      <div class="form-group" id="dependent4">
                 <span class="input-group-addon" id="basic-addon3">Dependent Certificate:</span>
            <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dependentCertificate">
                    Attached
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dependentCertificate">
                    Not Required
                </label>
              </div>
           </div>
                </div>
                  
                      <div class="form-group">
                  <label for="hospitalAddress">Enter the category of CGHS Applicant</label>
               <select class="custom-select form-control" name="appCGHScategory" required >
                <option value="" selected disabled>Please select</option>
                <option value="General">General</option>
                <option value="Private">Private</option>
                <option value="Semi-Private">Semi-Private</option>
            </select>
                </div>
                  
               <input type="hidden" name="disease" value="none">
               
        <input type="hidden" name="pincode" value=0>
        <input type="hidden" name="amtAsked" value=0>
              </div>
            
	   
	      </div>
	      <!-- /.box-body -->
	
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	    </div>
	   </div>
	  </div>
	 </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("includes/footer.php"); ?>