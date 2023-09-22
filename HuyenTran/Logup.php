<?php
session_start();
include 'class/Database.php';
include 'class/Auth.php';

$db = new Database();
$pdo = $db->getConnect();

$error = '';

$product = new Auth();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 0; //khi đăng ký tài khoản, mặc định là tài khoản user

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $error = Auth::logup($pdo, $username, $hash, $role);
    if($error){
        header('location: Login.php');
        exit();
    }
}
?>

<?php include 'include/header.php'; ?>
<hr>
<div class="container text-center d-flex align-items-center min-vh-200">
    <div class="card mx-auto py-3" style="width: 40rem">
        <div class="header-content-create-acc">
            <p style="font-size: 30px; text-transform: uppercase;"><b>Đăng Ký Tài Khoản</b></p>
            <p style="font-size: 14px; color:#878c8f;">Tạo tài khoản truy cập website</p>
        </div>
        <hr>
        <div class="card-body">
            <div class="input-create-acc mb-3">
                <form action="Logup.php" method = "post">
                    <div class="mb-3">
                        <label style="float: left">Tài khoản</label>
                        <input type="text" placeholder="Nhập tên tài khoản" class="form-control" id="username" name="username" required/>
                    </div>
                    <div class="mb-3">
                        <label style="float: left">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu của bạn" class="form-control" id="password" name="password" required/>
                    </div>
                    <div class="mb-3">
                        <label style="float: left">Xác nhận mật khẩu</label>
                        <input type="password" placeholder="Xác nhận mật khẩu của bạn" class="form-control" id="confirm" name="confirm" required/>
                    </div>
                    <!-- <div class="mb-3">
                        <label style="float: left">Quyền truy cập (0 hoặc 1)</label>
                        <input type="number" class="form-control" id="role" name="role" required/>
                    </div> -->
                    <div class="button-create-acc">
                      <button class="button-create-acc" >Đăng Ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>