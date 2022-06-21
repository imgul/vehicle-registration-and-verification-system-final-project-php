<header>
    <!--Default Header Area Start-->
    <div class="default-header-area header-sticky">
        <div class="container" style="backdrop-filter: blur(4px);">
            <div class="row align-items-center">
                <!--Header Logo Start-->
                <div class="col-lg-3 col-md-6">
                    <div class="header-logo">
                        <a href="index.php"><img src="assets/img/logo/vehicle_logo.png" alt=""></a>
                    </div>
                </div>
                <!--Header Logo End-->
                <!--Header Menu Start-->
                <div class="col-lg-7  d-none d-lg-block">
                    <div class="header-menu-area">
                        <nav>
                            <ul class="main-menu">
                                <li class="<?php if ($page == 'index') echo 'active'; ?>"><a href="index.php">HOME</a>
                                <li class="<?php if ($page == 'contact') echo 'active'; ?>"><a href="contact.php">Contact</a></li>
                                <?php
                                // show menu only if not logged in
                                if (!isset($_SESSION['loggedIn'])) {
                                ?>
                                    <li class="<?php if ($page == 'login') echo 'active'; ?>"><a href="login.php">Login</a></li>
                                    <li class="<?php if ($page == 'register') echo 'active'; ?>"><a href="register.php">Register</a></li>
                                <?php
                                }
                                ?> <?php
                                    // show menu only when logged in
                                    if (isset($_SESSION['loggedIn'])) {
                                    ?>
                                    <li class="<?php if ($page == 'login') echo 'active'; ?>"><a href="#">My Account</a>
                                        <!-- <ul>
                                            <li class="<?php if ($page == 'bookings') echo 'active'; ?>"><a href="bookings.php">My Bookings</a></li>
                                            <li class="<?php if ($page == 'newbooking') echo 'active'; ?>"><a href="newbooking.php">New Booking</a></li>
                                            <li class="<?php if ($page == 'forgot-password') echo 'active'; ?>"><a href="forgot-password.php">Forgot Password</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="add-vehicle.php"><i class="fas fa-plus"></i> Add Vehicle</a></li>
                                    <li><a class="logoutBtn" href="#">Logout</a></li>
                                    <?php
                                        // show menu only if logged in and is admin
                                        if (isset($_SESSION['loggedIn']) && $_SESSION['user_role'] == 1) {
                                            echo '<li><a href="admin/index.php">Admin Panel</a></li>';
                                        }
                                    ?>
                                <?php
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--Header Menu End-->
                <!-- Content Wrapper -->

                <!-- End of Content Wrapper -->
                <!--Book Now Area Start-->
                <div class="col-lg-2 col-md-6">
                    <div class="book-now-btn text-right">
                        <a href="check-vehicle.php">Check Vehicle</a>
                    </div>
                </div>
                <!--Book Now Area Start-->
            </div>
            <div class="row">
                <div class="col-12">
                    <!--Mobile Menu Area Start-->
                    <div class="mobile-menu d-lg-none d-xl-none"></div>
                    <!--Mobile Menu Area End-->
                </div>
            </div>
        </div>
    </div>
    <!--Default Header Area End-->
</header>