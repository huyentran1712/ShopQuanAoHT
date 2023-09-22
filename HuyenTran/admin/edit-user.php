<?php 
$title = 'Edit User';
include '../class/Database.php';
include '../class/Auth.php';

?>

<?php
$username = "";
$password = "";
$role = "";

$usernameError = "";
$passError = "";
$roleError = "";
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["edit"]))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        //kiem tra rong
        if(empty($username) ){
            $usernameError = "Username is required.";
        }
        if(empty($password)){
            $passError = "Password is required.";
        }if(empty($role))
        {
            $roleError = "Role is required.";
        }else
        {
            if(($role != 0) || ($role != 1))
            {
                $error = "Quyền không xác định, chỉ nhận giá trị nguyên.";
            }
        }

        // No errors
        if (!$usernameError && !$passError && !$roleError) 
        {
            $db = new Database();
            $pdo = $db->getConnect();
            
            $product = new Auth();
            $product->username = $username;
            $product->password = $password;
            $product->role = $role;

            if ($product->edit($pdo, $_GET['id'])) {
                header ('location: QuanLyKH.php');
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
            <p style="font-size: 30px;"><b>CẬP NHẬT TÀI KHOẢN</b></p>            
        </div>
    </div>
</div>
<div class="container text-center d-flex align-items-center min-vh-200">
    <div class="card mx-auto py-3" style="width: 40rem">
        <div class="card-body">
            <div class="input-acc">
                <form method="post" action="edit-user.php" class="m-auto" enctype="multipart/form-data">
                    <div class = "form-group mb-3">
                        <label for="username" class="form-label" style="float: left">Username<span style = "color: red">*</span></label>
                        <input type="text" class="form-control" id="username" username="username" value="<?php echo $username?>"/>
                        <p class="text-danger fw-bold" style="float: right"><?php echo $usernameError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="password" style="float: left">Password<span style = "color: red">*</span></label>
                        <input type="password" class="form-control" username="password" id="password" value="<?php echo $password?>"></input>
                        <p style="float: right" class="text-danger fw-bold fw-bold"><?php echo $passError ?></p><br>
                    </div>
                    <div class = "form-group mb-3">
                        <label for="role" style="float: left">Role<span style = "color: red">*</span></label>
                        <input type="number" class="form-control" id="role" username="role" value="<?php echo $role ?>" />
                        <p class="text-danger fw-bold" style="float: right"> <?php echo $roleError ?></p><br>
                    </div>
                    <button type = "submit" class = "btn btn-info" username ="edit">Edit User</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>