<?php
session_start();
$title = "Cart Page";
include 'class/Database.php';
include 'class/Product.php';

$db = new Database();
$pdo = $db->getConnect();

$data = Product::getAll($pdo); 
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_SESSION['cart'][$_POST['proid']]['qty'] = $_POST['qty'];
}

if(isset($_GET['action']))
{
    $action = $_GET['action'];
    if($action == 'empty')
    {
        $_SESSION['cart'] = [];
    }
    if($action == 'delete')
    {
        if(isset($_GET['proid']))
        {
            $proid = $_GET['proid'];
            unset($_SESSION['cart'][$proid]);
        }
    }
}

?>
<?php include 'include/header.php'; ?>

<div class="container">
    <?php if(isset($_GET['action']) && $_GET['action']=='empty'):?>
            <div class="row" style=" align-item:center; margin: auto">
                <a href="cart.php?action=empty">
                    <img src="./mode/img-logo/Cart.gif" alt="Empty Cart" class="d-block" style="width:100%">
                </a>
            </div>
        <?php endif; ?>
        <table class="table my-3">
            <thead class="table-dark">
                <tr class = "text-right">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Số lượng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($_SESSION['cart'])):
                    $i = 1;
                    foreach($_SESSION['cart'] as $cart):
                        {
                            $product = Product::getOneByID($data, $cart['proid']);
                        }
                ?>
                <tr class="text-center">
                    <form method="post">
                        <td><?= $i ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= number_format($product->sale_price,0,',','.') ?> đ</td>
                        <td>
                            <input type="number" value="<?= $cart['qty'] ?>" name="qty" min="1" style="width:50px"/>
                            <input type="hidden" name="proid" value="<?= $cart['proid'] ?>"/>
                        </td>
                        <td>
                            <input type="submit" class="btn btn-warning" value="Update" name="update"/>
                            <!-- <a href="cart-item-update.php?action=update&proid=<?= $cart['proid'] ?>" class="btn btn-success">Thay đổi</a> -->
                            <a href="cart-item-remove.php?action=delete&proid=<?= $cart['proid'] ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </form>
                </tr>
                <?php $i++;
                    $total += $product->sale_price * $cart['qty'];
                endforeach;
                endif;?>
                <tr>
                    <td colspan="3" class="text-center">
                        <!-- <h4>Total: <?= number_format($total, 0, ',', '.') ?> đ</h4> -->
                    </td>
                </tr>
            </tbody>
        </table>
</div>

<?php include 'include/footer.php';?>