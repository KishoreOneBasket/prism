<?php
	session_start();
	include('../includes/db_config.php');
	include('../includes/checkLogin.php');
	$user_data = check_login($conn);
?>
<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="dashboard">
        <img style="margin-left: 25px;" src="../assets/img/avatars/logo-1.png" width="150px" class="img-fluid mb-2" alt="Prism Labs" />
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="font-weight-bold">
                <?php echo $user_data['Name']; ?>
            </div>
			<small><?php echo $user_data['Mobile']; ?></small>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Home
            </li>
            <li class="sidebar-item">
                <a href="dashboard" class="sidebar-link">
                    <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item">
                <a href="categories" class="sidebar-link">
                    <i class="align-middle mr-2 fas fa-fw fa-cat"></i> <span class="align-middle">Categories</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="tests">
                    <i class="align-middle mr-2 fas fa-fw fa-flask"></i> <span class="align-middle">Tests</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="banners" class="sidebar-link">
                    <i class="align-middle mr-2 fas fa-fw fa-bookmark"></i> <span class="align-middle">Banners</span>
                </a>
            </li>
            <li class="sidebar-header">
                Reports
            </li>
            <li class="sidebar-item">
                <a href="bookings" class="sidebar-link">
                    <i class="align-middle mr-2 fas fa-fw fa-book"></i> <span class="align-middle">Bookings</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="reports">
                    <i class="align-middle mr-2 fas fa-fw fa-chart-line"></i> <span class="align-middle">Reports</span>
                </a>
            </li>
            <?php if ($user_data['Role'] == 'Admin') { ?>
            <li class="sidebar-header">
                Auth
            </li>
            <li class="sidebar-item">
                <a href="#layouts" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">Users</span>
                </a>
                <ul id="layouts" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="users">App Users</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="wUsers">Web Users</a></li>
                </ul>
            </li>
            <?php } ?>
            <li class="sidebar-header">
                Payments
            </li>
            <li class="sidebar-item">
                <a href="failedPayments" class="sidebar-link">
                    <i class="align-middle mr-2 fas fa-fw fa-rupee-sign"></i> <span class="align-middle">Failed Payments</span>
                </a>
            </li>
        </ul>
    </div>
</nav>