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
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form22_btn'>Permission</button></div>
          <?php
            break;
            case 'OP_EMERGENCY': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form7_btn'>Forwarding Letter</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button>
        </div>
          <?php
            break; 
            case 'OP_REFERRAL': ?>
                <div class='col-md-3'><button type='submit' class='btn btn-info' name='form2_btn'>Notesheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form15_btn'>Order</button></div>
          <?php
            break;
            case 'IP_EMERGENCY': ?>
          <div class='col-md-3'><button type='submit' class='btn btn-info' name='form3_btn'>Forwarding Letter</button></div>
       <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button> </div>
          <?php
            break;
            }
          ?>
          </form>
        
        <div class="col-md-6">
        
          <?php if ($_SESSION['sess_userrole']!="dealinghand") : ?>
    <div><h3>Approve?</h3></div>
    <button type="button" class="btn btn-success btn-lg btn-block col-md-6" data-toggle="modal" data-target="#approveModal">Yes</button>
        <!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="approveModalLabel">
                    Confirmation Details
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" action="update.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="orderNo">Comments:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="inputComment" name="inputComment" placeholder="Comment."/>
                    </div>
                  </div>
                <input name="appId" type="text" value="<?php echo $_GET['id'] ?>" class="hidden" />
                <input type="submit" name="approve_btn" id="submit-form"  />
                </form>   
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Cancel
                </button>
            </div>
        </div>
    </div>
</div>
    <button type="button" class="btn btn-danger btn-lg btn-block " data-toggle="modal" data-target="#denyModal">No</button>
      <!-- Modal -->
<div class="modal fade" id="denyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="denyModalLabel">
                    Are you sure to Send for Re evaluation.
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" method="post" action="update.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="reason">Reason</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="inputComment" name="reason" placeholder="Reason"/>
                    </div>
                  </div>
                <input name="appId" type="number" value="<?php echo $_GET['id'] ?>" class="hidden" />
                <input type="submit" id="submit-form" name="deny_btn" />
                </form>   
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Cancel
                </button>
            </div>
        </div>
    </div>
</div>
    <?php endif; ?>
      
      
      
		</div>

		</div>
  
      
    </section>

    <!-- /.content -->

    <div class="clearfix"></div>
</div>

<?php include("includes/footer.php"); ?>