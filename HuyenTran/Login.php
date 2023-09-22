<?php
session_start();

$title ='Login Page';
include 'class/Database.php';
include 'class/Auth.php';

$db = new Database();
$pdo = $db->getConnect();

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = Auth::getOneById($pdo, $username);
    $error = Auth::login($pdo, $username, $password, $role);

}
?>

<?php include 'include/header.php'; ?>

<div class="container text-center d-flex align-items-center min-vh-200">
    <div class="card mx-auto py-5" style="width: 30rem">
        <div class="header-acc-title mb-3">
            <p style="font-size: 20px; text-transform: uppercase;"><b>Đăng Nhập Tài Khoản</b></p>
            <p style="font-size: 14px; color:#878c8f;">Nhập tài khoản và mật khẩu của bạn</p>
        </div>
        <hr>
        <div class="card-body">
            <div class="input-acc-login mb-3">
                <form action="Login.php" method = "post">
                    <div class="mb-3">
                        <label style="float: left">Tài khoản</label>
                        <input type="text" placeholder="Nhập tên tài khoản" class="form-control" id="username" name="username" required/>
                    </div>
                    <div class="mb-3">
                        <label style="float: left">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu của bạn" class="form-control" id="password" name="password" required/>
                    </div>
                    <input type="submit" class="btn btn-dark btn-lg btn-block" name="login_detail" value="Đăng nhập">
                </form>
            </div>
        </div>
        <div class="site_account">
            <p>Khách hàng mới?&nbsp;<a href="Logup.php">Đăng ký tài khoản</a></p>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>