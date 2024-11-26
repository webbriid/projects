<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
                <a href="index.php">
                    <b class="logo-icon">
                        <img src="assets/pearl-one-travels.png" alt="homepage" class="dark-logo" style="width:130px" />
                        <img src="assets/pearl-one-travels.png" alt="homepage" class="light-logo" style="width:130px" />
                    </b>
                    <!-- <span class="logo-text">
                        <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                    </span>
                </a> -->
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                        id="bell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge badge-primary notify-no rounded-circle">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                   
                        <ul class="list-style-none">
                        <?php
                        // Database connection
                        require('config/db.php');

                        //fetch Query

                        try {
                            $sql = "SELECT * FROM enquiry LIMIT 5";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $enquiry_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (Exception $e) {
                            echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
                        }
                        ?>
                        
                        <?php foreach ($enquiry_details as $enquiry) : ?>
                            <li>
                                <div class="message-center notifications position-relative">
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <div class="btn btn-danger rounded-circle btn-circle">
                                            <i data-feather="airplay" class="text-white"></i>
                                        </div>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1"><?= $enquiry['name']?></h6>
                                            <span class="font-12 text-nowrap d-block text-muted"><?= $enquiry['special_request']?></span>
                                            <span class="font-12 text-nowrap d-block text-muted"><?= $enquiry['create_date']?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                            <li>
                                <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                    <strong>Check all </strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                        <span class="ml-2 d-none d-lg-inline-block"><span></span>
                            <span class="text-dark"><?= $login_user ?></span> <i data-feather="chevron-down"
                                class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="profile.php">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="settings" class="svg-icon mr-2 ml-1"></i> Account Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>