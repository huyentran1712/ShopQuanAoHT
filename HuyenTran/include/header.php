<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mode/bootstrap/css.css">
    <link rel="stylesheet" href="product.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="mode/img-logo/LogoBanQuyenHT.gif" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title><?php echo $title ?></title>
</head>
<body>
    <div id="main">
        <div class="header-main">
            <header class="header">
                <!-- Header liên hệ -->
                <div class="header-contacts">
                    <div class="container">
                        <div class="contact-header-list">
                            <div class="row">
                                <div class="col-sm contact-list">
                                    <a href="">Hotline: 0123456789</a>
                                    <span class="doc">|</span>
                                    <a href="">Email: 2001200004@hufi.edu.vn</a>
                                </div>
                                <div class="col-sm icon-header" style="text-align:right">
                                    <!-- Tài khoản -->
                                    <?php if(isset($_SESSION['username']) && $_SESSION['username'] != ""): ?>
                                        <a href="#" title="<?php echo $_SESSION['username'] ?>" class="icon-header-list">
                                            <i class="fa-solid fa-user-check fa-beat"></i>
                                        </a>
                                        <!-- Giỏ hàng -->
                                        <a href="cart.php" title="Giỏ Hàng" class="icon-header-list">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                        <?php if(isset($_SESSION['cart']))
                                            {echo count($_SESSION['cart']);}
                                        ?>
                                        <a href="Logout.php" title="Đăng xuất" class="icon-header-list">
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                                        </a>
                                    <?php else: ?>
                                        <a href="Login.php" title="Đăng nhập" class="icon-header-list">
                                            <i class="fa-solid fa-circle-user"></i>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <!-- Thong bao -->
                                    <a href="#" title="Thông báo" class="icon-header-list">
                                        <i class="fa-regular fa-bell fa-shake"></i>
                                    </a>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header menu -->
                <div class="header-menus">
                    <div class="container">
                        <div class="row header-wrap-content">
                            <div class="col-md-1 logo"><a href="index.php"><img src="mode/img-logo/LogoBanQuyenHT.gif" style="width: 90px;" alt=""></a></div>
                            <div class=" col-md-6 header-menu">
                                <div class="menu-list">
                                    <ul class="nav justify-content-center">
                                        <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                                        <li class="nav-item"><a class="nav-link" href="SanPham.php">Sản Phẩm</a></li>
                                        <li class="nav-item"><a class="nav-link" href="BangSize.php">Bảng Size</a></li>
                                        <li class="nav-item"><a class="nav-link" href="KhuyenMai.php">Khuyến Mãi</a></li>
                                        <li class="nav-item"><a class="nav-link" href="GioiThieu.php">Giới Thiệu</a></li>
                                    </ul>
                                </div>
                            </div>
                            <form action="index.php" class="col-md-3 offset-md-2 icon-search" method ="get">
                                <input type="search" name ="timkiem" aria-label="Search" class="form-control"
                                    placeholder="Tìm kiếm tên sản phẩm..." style="font-size: 14px;" required>
                                    
                                <button type="submit" class="btn btn-light" name="btnTimKiem">
                                    <i class='bx bx-search'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
        </div>