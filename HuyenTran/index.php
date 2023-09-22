<?php 
session_start();

$title = 'Home Page';
include 'class/Database.php';
include 'class/Product.php';

?>

<?php
$db = new Database();
$pdo = $db->getConnect();

$data = Product::getAll($pdo);
?>

<?php include 'include/header.php'; ?>

<!-- Trang chủ hiển thị tổng quan sản phẩm -->
<div class="content-section">
    <div class="banner-contact">
        <div class="container">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <!-- button ngang bên dưới ảnh -->
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="mode/img-banner/banner1.png" alt="" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="mode/img-banner/banner2.jpg" alt="" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="mode/img-banner/banner3.jpg" alt="" class="d-block" style="width:100%">
                    </div>
                </div>
                <!-- button trái-phải -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Trang chủ hiển thị sản phẩm lấy từ CSDL -->
    <div class="section-product-collection">
        <div class="home-product-collection">
            <div class="container">
                <div class="section-heading">
                    <h2 class="heading-title">
                        <a href="SanPham.php">SẢN PHẨM MỚI</a>
                    </h2>
                    <!-- nếu không tìm kiếm thì hiển thị trang chủ sản phẩm -->
                    <?php if(!isset($_GET['btnTimKiem'])) : ?>
                    <div class="listproduct-row">
                        <?php $count=1; ?> <!-- hien thi so luong san pham tren trang chu -->
                        <?php foreach($data as $product): ?>
                            <?php if($count <=12): ?>
                                <div class="col-md-3">
                                    <div class="card"> 
                                        <div class="card-title">
                                            <div class="pro-sale">
                                                <span>- <?php echo $product->sale ?></span>
                                            </div>
                                            <div class="box">
                                                <a href="ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                    <img src="./mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body product-details">
                                            <h3><?php echo $product->name ?></h3>
                                            <div class="product-price">
                                                <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                            </div>
                                        </div>                              
                                    </div>
                                </div>
                                <?php $count++; ?>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </div>
                    <?php else: ?>
                    <!-- khi tìm kiếm sản phẩm -->
                        <?php 
                            if(isset($_GET["btnTimKiem"]))
                            {
                                $ten=$_GET["timkiem"];
                            
                                $sql = "SELECT *, (SELECT COUNT(*) FROM ao WHERE name LIKE '%$ten%')
                                        AS 'Số lượng' FROM ao
                                        WHERE name LIKE '%$ten%'";
                                $sta = $pdo->prepare($sql);
                                $sta->execute();
                                if($sta->rowCount()>0){
                                    $sanpham = $sta->fetchAll(PDO::FETCH_CLASS, 'Product');
                                }else{  
                                    echo '<div class="row " style=" align-item:center; margin: auto">
                                    <a href="#">
                                        <img src="./mode/img-logo/searchError.jpg" alt="" class="d-block" style="width:100%">
                                    </a>
                                </div>';
                                }

                            }
                        ?>
                        <div class="listproduct-row">
                        <?php $dem = 1; ?> <!-- hien thi so luong san pham tren trang chu -->
                        <?php if(isset($sanpham)):?>
                            <?php foreach($sanpham as $product): ?>
                                <?php if($dem <= 20): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="./mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                    <?php $dem++; ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</div>
        
<?php include 'include/footer.php'; ?>
