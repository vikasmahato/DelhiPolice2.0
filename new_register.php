<?php include("includes/header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       New Register Entry
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
	      <form role="form" method="post" action="add_register.php" enctype="multipart/form-data">
              <div class="box-body">
                  
                  
                      <div class="form-group">
                  <span class="input-group-addon" id="basic-addon3">Enter Diary No:</span>
            <input type="text" class="form-control" id="diary" name="diaryNo" placeholder="Diary No" required >
                             <select class="custom-select form-control" name="diaryType" required >
                         <option value="Hospital">Hospital</option>
                         <option value="Individual">Individual</option>
                    </select>
                          
            <span class="input-group-addon" id="dated">/Genl. Branch/SED dated</span>
            <input type="text" class="form-control" id="datepicker" name="diaryDate" required >
                </div>
                  
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
                 <input type="text" class="form-control" id="basic-url" name="applicantName" placeholder="Applicant Name" required >
                </div>
                <div class="form-group">
                  <label for="idNo">Belt No</label>
                  <input type="text" class="form-control" id="basic-url" name="idNo" placeholder="Belt No" required >
                </div>
                <div class="form-group">
                  <label for="pis">PIS No</label>
                  <input type="text" class="form-control" id="basic-url" name="pis" placeholder="PIS No" required >
                </div>
                
                   <div class="form-group">
                  <label for="treatment_by">Treatment Taken By</label>
                 <input type="text" class="form-control" id="basic-url" name="treatment_by" placeholder="Treatment taken by?" >
                </div>
                  
                  
                      <div class="form-group">
                  <label for="hospitalName">Enter Hospital Name</label>
                 <input type="text" class="form-control" id="basic-url" name="hospitalName" placeholder="Hospital Name" required >
                </div>
                  
                    <div class="form-group">
                  <label for="type">Case Type</label>
                   <select class="custom-select form-control" name="type" required >
                         <option value="" selected disabled>Please select</option>
                         <option value="Emergency">Emergency</option>
                         <option value="Referral">Referral</option>
                        <option value="Govt">Govt</option>
                        
                    </select>
                </div>
                  
                  
                      <div class="form-group">
                  <label for="amt_claimed">Amount Claimed</label>
               <input type="number" class="form-control" id="basic-url" name="amt_claimed" placeholder="Amount Claimed" >
                </div>
                  
                  
                      <div class="form-group">
                  <label for="admis_amt">Admissible Amount</label>
               <input type="number" class="form-control" id="basic-url" name="admis_amt" placeholder="Admissible Amount" >
                </div>
                  
                      <div class="form-group">
                  <label for="send_to">Send To</label>
                   <select class="custom-select form-control" name="send_to" >
                         <option value="" selected disabled>Please select</option>
                         <option value="Account Br.">Account Br.</option>
                         <option value="PHQ">PHQ</option>
                    </select>
              
                
                  <label for="number">Number</label>
               <input type="number" class="form-control" id="basic-url" name="number" placeholder="Number">
            
               
                  <label for="date">Date</label>
               <input type="text" class="form-control" id="datepicker" name="date" placeholder="Date">
                </div>
                  
                     <div class="form-group">
                  <label for="sanction_no">Sanction No</label>
               <input type="number" class="form-control" id="basic-url" name="sanction_no" placeholder="Sanction No">
                </div>
                  
                
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