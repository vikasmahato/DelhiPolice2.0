  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user_id']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php if($currentPage =='dashboard' ){echo 'active';}?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li class="treeview <?php if($currentPage =='register' ){echo 'active';}?>">
          <a href="register.php">
            <i class="fa fa-dashboard"></i> <span>Register</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='referral' ){echo 'active';}?>">
          <a href="referral.php">
            <i class="fa fa-dashboard"></i> <span>Referral/Govt. Claim</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='emg_individual' ){echo 'active';}?>">
          <a href="emg_individual.php">
            <i class="fa fa-dashboard"></i> <span>Emergency Claim</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='emg_credit' ){echo 'active';}?>">
          <a href="emg_credit.php">
            <i class="fa fa-dashboard"></i> <span>Emergency Credit</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='permission_treatment' ){echo 'active';}?>">
          <a href="permission_treatment.php">
            <i class="fa fa-dashboard"></i> <span>Permission Treatment</span>
          </a>
        </li>
            <li class="treeview <?php if($currentPage =='permission_credit' ){echo 'active';}?>">
          <a href="permission_credit.php">
            <i class="fa fa-dashboard"></i> <span>Permission Credit</span>
          </a>
        </li>     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
