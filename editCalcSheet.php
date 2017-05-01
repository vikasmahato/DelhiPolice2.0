<?php include("includes/header.php"); ?>

<?php
$s_no = $_GET['id'];

$quotation_items = "SELECT * FROM `medical` WHERE app_id = $s_no";

$items = mysqli_query($con, $quotation_items);

    $si = 0;
   $table_data = '';
    foreach ($items as $row) {
    $si++;        
        $table_data = $table_data.'
        <tr>
              <td><input class="case" type="checkbox"/></td>
              <td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_'.$si.'" class="form-control autocomplete_txt" autocomplete="off" value="'.$row['app_id'].'"></td>
                            <td><input type="text" data-type="hospName" name="itemHosp[]" id="itemHosp_'.$si.'" class="form-control" autocomplete="off" value="'.$row['bill_no_hosp'].'"></td>
                            <td><input type="text" data-type="text" name="itemDate[]" id="itemDate_'.$si.'" class="form-control" autocomplete="off" required value="'.$row['date'].'"></td>
              <td><input type="text" data-type="productName" name="itemName[]" id="itemName_'.$si.'" class="form-control autocomplete_txt" autocomplete="off" value="'.$row['treatment'].'"></td>
                            <td><input type="number" step="any" name="total_asked[]" id="total_asked_'.$si.'" class="form-control totalAskedPrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="'.$row['amt_asked'].'"></td>
              <td><input type="number" step="any" name="total[]" id="total_'.$si.'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="'.$row['total'].'"></td>
            </tr>
        ';
    }

$amount = mysqli_fetch_assoc(mysqli_query($con, "SELECT amt_granted, amt_asked FROM form WHERE app_id='".$s_no."' "))

?>

    <link href="dist/css/style.css" rel="stylesheet">

    <!-- Begin page content -->
    <div class="content-wrapper">
           <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Calculation Sheet
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Application</a></li>
        <li class="active">Calculation Sheet</li>
      </ol>
    </section>

         <!-- Main content -->
    <section class="content">
        <div class="row">
                <div class="box box-primary">
            <div class="box-header with-border">
            
        <form id="CalculationSheet" action="calcSheet.php" method="post">
              <div class="box-body">
          
                     <div class="form-group">
                  <label for="appCGHScategory">Category</label>
                         
            <select class="custom-select" name="appCGHScategory" id="appCGHScategory" required >
                <option value="" selected disabled>Please select</option>
                <option value="General">General</option>
                <option value="Private">Private</option>
                <option value="Semi-Private">Semi-Private</option>
            </select>
                  </div>
                  
                  <div class="form-group">
                  <label for="claimCheck">Hospital Tpye</label>
                  <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="h_type" id="nabh_nabl" value="nabh_nabl">
                    NABH
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="h_type" id="non_nabh_nabl" value="non_nabh_nabl">
                    NON NABH
                </label>
              </div>
           </div>
                </div>
        
        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
              <th width="8%">S No</th>
                            <th width="15%">Bill No, Hosp Name</th>
                            <th width="10%">Date</th>
              <th width="45%">Name of tests</th>
                            <th width="10%">Amount Claimed</th>
              <th width="10%">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php echo  $table_data; ?>
          </tbody>
        </table>
          </div>
        </div>
        <div class='row'>
          <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
            <button class="btn btn-danger delete" type="button">- Delete</button>
            <button class="btn btn-success addmore" type="button">+ Add More</button>
          </div>
          <div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
        <div class="form-group">
            <label>Amount asked: &nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon">₹</div>
              <input type="number" step="any" class="form-control" name="askedTotal" id = "askedTotal" placeholder="Amount asked" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $amount['amt_asked']?>">
            </div>
          </div>
          <div class="form-group">
            <label>Total: &nbsp;</label>
            <div class="input-group">
              <div class="input-group-addon">₹</div>
              <input type="number" step="any" class="form-control" name="subTotal" id = "subTotal" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $amount['amt_granted']?>">
            </div>
          </div>
                <input type="hidden" name="appId" value="<?php echo $_GET['id'] ?>">
              <input type="hidden" name="edit" value="edit">
                <div class="bt"><button type="submit" class="btn btn-info" >SUBMIT</button>
                </div>
          </div>
           </div>
        </form>
                
                    </div>
            </div>
        </div>
        </section>
    <!-- /.content -->
        
      </div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2017 All rights
    reserved.
  </footer>
</div>

     
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/jquery-ui.min.js"></script>
   <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="dist/js/checklist_ajax.js"></script>
    <script src="js/script.js"></script>
</body>
</html>