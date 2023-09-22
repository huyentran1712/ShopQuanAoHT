<?php 
$title = 'Create Product';
include '../class/Database.php';
include '../class/Product.php';

$name = "";
$description = "";
$sale = "";
$sale_price = "";
$cost = "";
$image = "";
$type = "";

$NameError = "";
$DescError = "";
$SaleError = "";
$Sale_priceError = "";
$CostError = "";
$ImageError = "";
$PriceError = "";
$TypeError = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["btnsubmit"]))
    {
        $id = null;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $sale = $_POST['sale'];
        $sale_price = $_POST['sale_price'];
        $cost = $_POST['cost'];
        $image = $_FILES["image"]["error"]==0?$_FILES["image"]["name"]:"";
        $type =$_POST['type'];

        //upload file
        $pathinfo = pathinfo($_FILES['image']['name']);
        //lấy tên file
        $fname = $pathinfo['filename'];
        //gán mặc định tên file
        //$fname = 'aothun';

        //lấy phần mở rộng
        $extension = $pathinfo['extension'];

        $dest = '../mode/img-Aothun/' . $fname . '.' . $extension;

        move_uploaded_file($_FILES['image']['tmp_name'], $dest);

        //ktra rong
        if(empty($name) ){
            $NameError = "Name is required.";
        }
        if(empty($description)){
            $DescError = "Description is required.";
        }if(empty($sale))
        {
            $SaleError = "Sale is required.";
        }if(empty($sale_price))
        {
            $Sale_priceError = "Sale_price is required.";
        }if(empty($cost))
        {
            $CostError = "Cost is required.";
        }if(empty($type))
        {
            $TypeError = "Type is required.";
        }else
        {
            if(($sale_price % 10000 != 0) && !is_int($sale_price) || ($cost % 10000 != 0) && !is_int($cost))
            {
                $PriceError = "Sale_price or Cost must be divisible by 10000.";
            }
        }

        // No errors
        if (!$NameError && !$DescError && !$SaleError && !$Sale_priceError && !$CostError && !$TypeError && !$PriceError) 
        {
            $db = new Database();
            $pdo = $db->getConnect();
            
            $product = new Product();
            if ($product->create($pdo, $name, $description, $sale, $sale_price, $cost, $fname . '.' . $extension, $type)) {
                header ('location: index.php');
                exit;
            }
        }
    }
}
?>


<?php require 'header.php'; ?>
<hr>
<div class="container text-center d-flex align-items-center min-vh-200">
    <div class="card mx-auto py-3 text-light" style="width: 40rem; background-color: black">
        <div class="card-title" >
            <p style="font-size: 30px;"><b>THÊM MỚI SẢN PHẨM</b></p>            
        </div>
    </div>
</div>
<div class="container text-center d-flex align-items-center min-vh-200">
    <div class="card mx-auto py-3" style="width: 40rem">
        <div class="card-body">
            <div class="input-acc">
                <form method="post" action="new-product.php" class="m-auto" enctype="multipart/form-data">
                    <div class = "form-group mb-3">
                        <label for="name" class="form-label" style="float: left">Name<span style = "color: red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>"/>
                        <p class="text-danger fw-bold" style="float: right"><?php echo $NameError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="description" style="float: left">Description<span style = "color: red">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="5"><?php echo $description?></textarea>
                        <p style="float: right" class="text-danger fw-bold fw-bold"><?php echo $DescError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="sale" style="float: left">Sale<span style = "color: red">*</span></label>
                        <input type="text" class="form-control" id="sale" name="sale" value="<?php echo $sale ?>" />
                        <p class="text-danger fw-bold" style="float: right"> <?php echo $SaleError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="sale_price" style="float: left">Sale Price<span style = "color: red">*</span></label>
                        <input type="number" class="form-control" id="sale_price" name="sale_price" value="<?php echo $sale_price ?>" />
                        <p class="text-danger fw-bold" style="float: right"><?php echo $Sale_priceError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="cost" style="float: left">Cost<span style = "color: red">*</span></label>
                        <input type="number" class="form-control" id="cost" name="cost" value="<?php echo $cost ?>" />
                        <p class="text-danger fw-bold" style="float: right"><?php echo $CostError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="image" style="float: left">Image<span style = "color: red">*</span></label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="type" style="float: left">Type<span style = "color: red">*</span></label>
                        <input type="text" name="type" class="form-control"/>
                    </div>
                    <button type = "submit" class = "btn btn-info" name ="btnsubmit">Add Product</button>
                    <button class = "btn btn-danger"><a href="QuanLySP.php">Product Management</a></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>