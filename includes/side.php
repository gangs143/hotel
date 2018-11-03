<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="<?php echo $_SESSION['picture']; ?>" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?php echo $_SESSION['fullname']; ?>  <span id="btnProfile" class="fa fa-eyedropper"></span></div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="index.php"><i class="sidebar-item-icon fa fa-dashboard"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">MENUS</li>
            <li>
                <a href="guest.php"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Guests</span></a>
            </li>
            <li>
                <a href="checking.php"><i class="sidebar-item-icon fa fa-hotel"></i>
                    <span class="nav-label">Checkin</span></a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Staff</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="staff.php">Staf</a>
                    </li>
                    <li>
                        <a href="payroll.php">Payroll</a>
                    </li>
                </ul>
            </li>
             <li>
                <a href="dailyExp.php"><i class="sidebar-item-icon fa fa-money"></i>
                    <span class="nav-label">Expenses</span></a>
            </li>
            <li>
                <a href="room.php"><i class="sidebar-item-icon fa fa-hotel"></i>
                    <span class="nav-label">Rooms</span></a>
            </li>
            <li>
                <a href="roomtype.php"><i class="sidebar-item-icon fa fa-hotel"></i>
                    <span class="nav-label">Roomtype</span></a>
            </li>
           <!--  <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Reports</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </li> -->
             <li>
                <a href="hotel.php"><i class="sidebar-item-icon fa fa-info"></i>
                    <span class="nav-label">About</span></a>
            </li>            
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
<div class="content-wrapper">
    