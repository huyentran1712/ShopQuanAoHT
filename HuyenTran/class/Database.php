<?php 
class Database 
{
    public function getConnect()
    {
        $host = "localhost";
        $db = "shopquanao";
        $user = "huyentran12";
        $pass = "shopquanao123";

        $dsn = "mysql:host=$host; dbname=$db; charset=utf8";
        
        try{
            $pdo = new PDO($dsn, $user, $pass);
            if($pdo)
            {
                return $pdo;
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed".$e->getMessage();
            exit();
        }
    }
}
?>