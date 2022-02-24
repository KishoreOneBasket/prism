<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                    <i class="align-middle fas fa-cog"></i>
                    <span class="indicator"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item"><i class="align-middle mr-1 fas fa-fw fa-user"></i> <?php echo $user_data['Name']; ?></a>
                    <a class="dropdown-item" href="../admin/cPassword"><i class="align-middle mr-1 fas fa-fw fa-key"></i>Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"  href="../admin/logout"><i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>