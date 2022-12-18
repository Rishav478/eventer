<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="scanner.php" class="nav-link nav-link-lg" title="Scan QR Ticket">
                <i data-feather="maximize"></i>
              </a>
            </li>
            <li>
                <form method="get" action="all-orders.php" style="width:auto;">
                    <input type="text" class="form-control" name="orderId" placeholder="Search Order" style="border-radius:25px; width:auto;" required>
                    <input hidden type="submit" class="form-control" name="searchOrder" value="Search Order">
                </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
<?php
  if ($profile == NULL) {
?>
              <img alt="image" src="assets/uploads/org-image/dummy.png" class="user-img-radious-style">
<?php
} else {
?>
              <img alt="image" src="assets/uploads/org-image/<?= $profile ?>" class="user-img-radious-style">
<?php } ?>
              <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?= $_SESSION['name'] ?></div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <a href="changePassword.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Change Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
              
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="book-open"></i><span>Events</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add-events.php">Add Event</a></li>
                <li><a class="nav-link" href="view-events.php">View Events</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="dollar-sign"></i><span>Revenue</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all-orders.php">Orders</a></li>
                <li><a class="nav-link" href="all-payouts.php">Payouts</a></li>
                <li><a class="nav-link" href="add-bank-details.php">Bank Account</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="about-me.php" class="nav-link"><i data-feather="user"></i><span>About Me</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Referrals</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add-referrals.php">Add Referrals</a></li>
                <li><a class="nav-link" href="view-referrals.php">View Referrals</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link"><span class="fas fa-sign-out-alt text-danger"> Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>

