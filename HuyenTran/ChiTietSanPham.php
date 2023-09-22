<?php 
session_start();
$title ='Product Page';
require 'class/Database.php';
require 'class/Product.php';

if(!isset($_GET["id"])){
    die("Không có id để thực thi trang này");
}

$id = $_GET["id"];

$db = new Database();
$pdo = $db->getConnect();
$data = Product::getAll($pdo);
$product = Product::getOneByID($pdo, $id);

if (!$product) {
    die("ID không hợp lệ !!!");
}

?>
<?php
if(isset($_GET['action']) && isset($_GET['proid']))
{
    $action = $_GET['action'];  
    $proid = $_GET['proid'];

    if($action == 'addcart')
    {
        $pro = Product::getOneById($data, $proid);
        if($pro)
        {
            $proidCol = array_column($_SESSION['cart'], 'proid');
            if(in_array($proid, $proidCol))
            {
                $_SESSION['cart'][$proid]['qty'] += 1;
            }
            else
            {
                $item = [
                    'proid' => $proid,
                    'qty' => 1
                ];
                $_SESSION['cart'][$proid] = $item;
            }
        }
    }
}
?>

<?php include './include/header.php'; ?>

<div class="content-section">
    <div class="container">
            <?php if ($product->id == $id) : ?>
                <div class="product-menu">
                    <div class="product-menu-lists">
                        <ol class="product-menu-list">
                            <li><a href="./index.php">Trang chủ / </a></li>
                            <li><a href="./SanPham.php">Sản Phẩm / </a></li>
                            <li><?php echo $product->name ?></li>
                        </ol>
                    </div>
                </div>
            <?php endif; ?>
    </div>
    <div class="product-Details">
        <div class="container">
            <div class="row">
                    <?php if ($product->id == $id) : ?>
                        <div class="col-md-5 product-gallery">
                            <div class="product-content-gallery">
                                <div class="product-gallery-img">
                                    <img src="./mode/img-Aothun/<?php echo $product->image ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md product-detail">
                            <div class="product-content-detail">
                                <div class="row product-order">
                                    <div class="product-order-heading">
                                        <h1><?php echo $product->name ?></h1>
                                        <h6>Tình trạng: Còn hàng</h6>
                                    </div>
                                    <div class="product-order-price">
                                        <span class="pro-price-del">
                                            <?php echo number_format($product->cost, 0, ',', '.')?> ₫
                                        </span>
                                        <span class="pro-price">
                                            <?php echo number_format($product->sale_price, 0, ',', '.')?> ₫
                                        </span>
                                    </div>
                                    <div class="product-order-size">
                                        <div class="pro-size-text">
                                            Kích thước:
                                        </div>
                                        <div class=" pro-size-set">
                                            <form action="">
                                                &nbsp;&nbsp;<input type="radio" id="html" name="fav_language" value="M"> M
                                                &nbsp;&nbsp;<input type="radio" id="html" name="fav_language" value="L"> L
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <hr>

                                    <div class="row product-order-actions">
                                        <div class=" col-md-4 row product-order-quantity">
                                            <button onclick="clickDecrease()" type="button">-</button>
                                            <input type="text" class="quantity-input" value="0" id="result">
                                            <button onclick="clickIncrease()" type="button">+</button>
                                        </div>
                                        <div class="col-md porduct-order-buying">
                                            <!-- <button class="btn-pro-order-buying" type="button">
                                            
                                                <a href="SanPham.php?action=addcart&proid=<?= $product->id ?>" class="nav-link" data-bs-toggle="modal" data-bs-target="#thongbao">THÊM VÀO GIỎ HÀNG</a>
                                            </button> -->

                                            <button class="btn-pro-order-buying" type="button">
                                                <a href="SanPham.php?action=addcart&proid=<?= $product->id ?>" class="nav-link">THÊM VÀO GIỎ HÀNG</a>
                                            </button>
                                        </div>
                                        <!-- <div class="modal fade" id="thongbao" aria-labelledby="thongbao" aria-hidden="true" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="thongbao">Thông báo</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Không thể thêm vào giỏ hàng. Vui lòng đăng nhập để thêm vào giỏ hàng !!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="product-description">
                                <div class="row product-des">
                                    <div class="product-des-heading">
                                        <span>THÔNG TIN SẢN PHẨM</span>
                                    </div>
                                    <div class="product-des-text">
                                        <p><?php echo $product->description ?></p>
                                        <p>- Size M : &lt;1m55; cân nặng: &nbsp;&lt;50kg. <!-- &lt; : kí hiệu dấu < -->
                                        </br>- Size L : &lt;1m70; cân nặng: &nbsp;&lt;60kg. 
                                        </br>- Size XL: &gt;1m75; cân nặng: &nbsp;&gt;65kg.</p> <!-- &gt; : kí hiệu dấu > -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>

        </div>

    </div>
    <hr>
</div>

<?php include './include/footer.php'; ?>