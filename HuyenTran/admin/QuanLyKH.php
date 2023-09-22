<?php 
$title = 'User';
require '../class/Database.php';
require '../class/Auth.php';
?>

<?php
$db = new Database();
$pdo = $db->getConnect();


$data = Auth::getAll($pdo); 

?>

<?php include 'header.php'; ?>

<hr>
<div class="container">
    <div class="section-heading">
        <h2 class="heading-title">
            <a href="QuanLyKH.php">DANH SÁCH KHÁCH HÀNG</a>
        </h2>
        <hr>
            <div class="row">
                <nav class="navbar navbar-expand">
                    <div class="container">
                        <div class="navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="new-user.php" class="nav-link">Thêm tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Cài đặt</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">In dữ liệu</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Sao chép</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Thống kê</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>          
                <hr>
                <div style="width: 400px;">
                    <form action="QuanLyKH.php" class="col-md-12 offset-md-2 icon-search" method ="get">
                        <input type="search" name ="timkiemUser" aria-label="Search" class="form-control"
                            placeholder="Nhập tài khoản cần tìm ..." style="font-size: 14px;" required>
                        <button type="submit" class="btn btn-light" name="btnTimKiemUser">
                            <i class='bx bx-search'></i>
                        </button>
                    </form>
                </div>
                <br><br>
                <!-- nếu không tìm kiếm thì hiển thị trang chủ -->
                <?php if(!isset($_GET['btnTimKiemUser'])) : ?>
                    <div class="listproduct-row">
                        <table class="table table-success">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mã</th>
                                    <th>Tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Quyền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class ="table-group-divider">
                                <?php foreach ($data as $product) : ?>
                                    <tr>
                                        <td><?php echo $product->id ?></td>
                                        <td><?php echo $product->username ?></td>
                                        <td><?php echo $product->password ?></td>
                                        <td><?php echo $product->role ?></td>
                                        <td>
                                            <a href="edit-user.php?id=<?= $product->id ?>" class="btn btn-success" >Cập nhật</a>&nbsp;&nbsp;
                                            <a href="delete-user.php?id=<?= $product->id ?>" class="btn btn-danger" >Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                        <!-- khi thuc hien tìm kiếm  -->
                        <?php 
                            if(isset($_GET["btnTimKiemUser"]))
                            {
                                $ten=$_GET["timkiemUser"];
                            
                                $sql = "SELECT *, (SELECT COUNT(*) FROM user WHERE username LIKE '%$ten%') 
                                        AS 'Số lượng' FROM user WHERE username LIKE '%$ten%'";
                                $sta = $pdo->prepare($sql);
                                $sta->execute();
                                if($sta->rowCount()>0){
                                    $user = $sta->fetchAll(PDO::FETCH_CLASS, 'User');
                                }else{  
                                    echo '<div class="row" style=" align-item:center; margin: auto">
                                    <a href="#">
                                        <img src="../mode/img-logo/searchError.jpg" alt="" class="d-block" style="width:100%">
                                    </a>
                                </div>';
                                }
                            }
                        ?>
                        <?php if(isset($user)): ?>
                            <div class="listproduct-row">
                                <table class="table table-success">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Mã</th>
                                            <th>Tài khoản</th>
                                            <th>Mật khẩu</th>
                                            <th>Quyền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class ="table-group-divider">
                                        <?php foreach ($user as $product) : ?>
                                            <tr>
                                                
                                                <td><?php echo $product->username ?></td>
                                                <td><?php echo $product->password ?></td>
                                                <td><?php echo $product->role ?></td>
                                                <td>
                                                    <a href="edit-user.php?id=<?= $product->id ?>" class="btn btn-success" >Cập nhật</a>&nbsp;&nbsp;
                                                    <a href="delete-user.php?id=<?= $product->id ?>" class="btn btn-danger" >Xóa</a>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                <?php endif; ?>
            </div>
    </div>
</div>


<?php include 'footer.php'; ?>