<?php 
$title = 'Product';
require '../class/Database.php';
require '../class/Product.php';
?>

<?php
$db = new Database();
$pdo = $db->getConnect();

//Phân trang
$product_per_page = 12;
$page = $_GET['page'] ?? 1;

$limit = $product_per_page;
$offset = ($page-1) * $product_per_page;

$data = Product::getPage($pdo, $limit, $offset);
?>

<?php
$black = "BLACK";
$white = "WHITE";

$type_black = Product::type($pdo, $black);
$type_white = Product::type($pdo, $white);
?>

<?php
//sap xep
$asc = Product::increase($pdo);
$desc = Product::decrease($pdo);    
?>

<?php include 'header.php'; ?>

<hr>
<div class="section-product-collection">
    <div class="home-product-collection">
        <div class="container">
            <div class="section-heading">
                <h2 class="heading-title">
                    <a href="QuanLySP.php">DANH SÁCH SẢN PHẨM</a>
                </h2>
                <div class="dropdown col-md-4 offset-md-9">
                    <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
                    aria-expanded="false" style="border: 1px solid black">--- Chọn sản phẩm ---</a>

                    <ul class="dropdown-menu ">
                        <form method="post" action="QuanLySP.php">
                            <li class="dropdown-item"><button type="submit" name="black" class="dropdown-item">Áo thun đen</button> </li>
                            <li class="dropdown-item"><button type="submit" name="white" class="dropdown-item">Áo thun trắng</button> </li>
                            <li class="dropdown-item"><button type="submit" name="asc" class="dropdown-item">Sắp xếp tăng dần theo giá tiền</button></li>
                            <li class="dropdown-item"><button type="submit" name="desc" class="dropdown-item">Sắp xếp giảm dần theo giá tiền</button> </li>
                        </form>
                    </ul>
                </div>
                <hr>
                <!-- nếu không tìm kiếm thì hiển thị trang chủ sản phẩm -->
                <div class="listproduct-row">
                    <?php if(!isset($_GET['btnTimKiemAD'])) : ?>
                    
                        <?php
                            //sap xep tang theo gia tien
                            if(isset($_POST["asc"])):
                                foreach($asc as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                    <br>
                                                    <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                        <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                            style="color: #919b03; padding: 8px 2px"></i></a></span>
                                                    <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                        <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <!-- sap xep giam dan theo gia tien -->
                            <?php elseif(isset($_POST["desc"])):
                                foreach($desc as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                    <br>
                                                    <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                        <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                            style="color: #919b03; padding: 8px 2px"></i></a></span>
                                                    <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                        <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php elseif(isset($_POST["black"])):
                                foreach($type_black as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                    <br>
                                                    <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                        <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                            style="color: #919b03; padding: 8px 2px"></i></a></span>
                                                    <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                        <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php elseif(isset($_POST["white"])):
                                foreach($type_white as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                    <br>
                                                    <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                        <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                            style="color: #919b03; padding: 8px 2px"></i></a></span>
                                                    <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                        <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else:?>
                            <!-- hien thi binh thuong -->
                            <?php foreach($data as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card"> 
                                            <div class="card-title">
                                                <div class="pro-sale">
                                                    <span>- <?php echo $product->sale ?></span>
                                                </div>
                                                <div class="box">
                                                    <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                        <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body product-details">
                                                <h3><?php echo $product->name ?></h3>
                                                <div class="product-price">
                                                    <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                                    <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                                    <br>
                                                    <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                        <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                            style="color: #919b03; padding: 8px 2px"></i></a></span>
                                                    <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                        <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                        <?php endif; ?> 
                    <?php else: ?>
                    <!-- khi tìm kiếm sản phẩm -->
                    <?php 
                        if(isset($_GET["btnTimKiemAD"]))
                        {
                            $ten=$_GET["timkiemAD"];
                        
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
                                    <img src="../mode/img-logo/searchError.jpg" alt="" class="d-block" style="width:100%">
                                </a>
                            </div>';
                            }

                        }
                    ?>
                    <!-- <div class="listproduct-row"> -->
                        <?php foreach($sanpham as $product): ?>
                            <div class="col-md-3">
                                <div class="card"> 
                                    <div class="card-title">
                                        <div class="pro-sale">
                                            <span>- <?php echo $product->sale ?></span>
                                        </div>
                                        <div class="box">
                                            <a href="../ChiTietSanPham.php?id=<?php echo $product->id?>">
                                                <img src="../mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid img-tr" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body product-details">
                                        <h3><?php echo $product->name ?></h3>
                                        <div class="product-price">
                                            <span class="price"><?php echo number_format($product->sale_price, 0, ',', '.')?> đ</span>
                                            <span class="price-del text-danger"><?php echo number_format($product->cost, 0, ',', '.')?> đ</span>
                                            <br>
                                            <span><a class="btn" href="edit-product.php?id=<?= $product->id ?>" style="background-color: aqua; border-radius: 100%">
                                                <i class="fa-solid fa-pencil fa-beat" title="Sửa" 
                                                    style="color: #919b03; padding: 8px 2px"></i></a></span>
                                            <span><a class="btn" href="delete-product.php?id=<?= $product->id ?>" style="background-color: red; border-radius: 100%">
                                                <i class="fa-solid fa-trash-can fa-shake" style="color: yellow;  padding: 8px 2px"></i></a></span>
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="paging text-center">
                <?php for ($i = 1; $i < 4; $i++) {  
                    echo "<span class='text-danger '></span><a href='?page=$i' class='mx-auto text-danger' 
                    style='text-align:center; padding: 14px 20px; background-color: orange; text-decoration: none; border-radius: 100%'>
                    $i</a> ";
                } ?>
                
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>