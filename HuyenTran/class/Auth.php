<?php
class Auth
{
    public $id;
    public $username;
    public $password;
    public $role;
   
    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM user";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Auth');
            return $stmt->fetchAll();
        }
    }

    public static function login($pdo, $username, $password, $role)
    {
        $sql="SELECT password FROM user WHERE username=:username";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(":username",$username,PDO::PARAM_STR);
        if($stmt->execute()){
            $passwordvery=$stmt->fetchColumn();
            if(password_verify($password,$passwordvery)){
                if($role == 1){
                    $_SESSION['admin'] = $username;
                    header('location: admin/index.php');
                    exit();
                }else if($role == 0){
                    $_SESSION['username'] = $username;
                    header('location: index.php');
                    exit();
                }
            }
        }
        return 'Login Failed';
    }
    public static function role($pdo)
    {
        $sql = "SELECT * FROM user";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Auth');
            return $stmt->fetchAll();
        }
    }

    public static function getOneByID($pdo, $username)
    {
        $sql = "SELECT role FROM user WHERE username=:username";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        if($stmt->execute())
        {
            $kq = $stmt->fetchColumn();
            return $kq;
        }
    }

    // ----------------------------------------------------------------

    public static function logout()
    {
        //unset($_SESSION['role']);
        unset($_SESSION['admin']);
        unset($_SESSION['username']);
        header('Location: Login.php');
        exit();
    }

    public static function logup($pdo, $username, $password,$role) 
    {
        $sql = "INSERT INTO user(username, password, role) VALUES (:username, :password, :role)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $pdo->lastInsertId()+1;
            return true;
        }
    }

    public function edit($pdo, $id)
    {
        $sql = "UPDATE user SET username=:username, password=:password, role=:role WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt -> bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt -> bindValue(':password', $this->password, PDO::PARAM_STR);
        $stmt -> bindValue(':role', $this->role, PDO::PARAM_INT);
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute())    
        {
            $this->id = $pdo->lastInsertID();
            return true;
        }
    }     

    public function delete($pdo, $id)
    {
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute())
        {
            return true;
        }
    }

}
?>