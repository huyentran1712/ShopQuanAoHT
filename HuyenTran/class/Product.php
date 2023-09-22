<?php 

class Product
{
    public $id;
    public $name;
    public $description;
    public $sale;
    public $sale_price; //gia sale
    public $cost; //gia goc
    public $image;
    public $tyle;

    public static function getAll($pdo)
    {
        $sql = "SELECT * FROM ao";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function getPage($pdo, $limit, $offset)
    {
        $sql = "SELECT * FROM ao ORDER BY id LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function getPageType($pdo, $limit, $offset, $type)
    {
        $sql = "SELECT * FROM ao WHERE type=:type ORDER BY id LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function getOneByID($pdo, $id)
    {
        $sql = "SELECT * FROM ao WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute())
        {
            $stmt->setFetchMode(PDO::FETCH_CLASS,'Product');
            return $stmt->fetch();
        }
    }

    public function create($pdo, $name, $description, $sale, $sale_price, $cost, $image, $type) 
    {
        $sql = "INSERT INTO ao(name, description, sale, sale_price, cost, image, type) VALUES (:name, :description, :sale, :sale_price, :cost, :image, :type)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':sale', $sale, PDO::PARAM_STR);
        $stmt->bindValue(':sale_price', $sale_price, PDO::PARAM_INT);
        $stmt->bindValue(':cost', $cost, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        
    }

    public function edit($pdo, $id, $name, $description, $sale, $sale_price, $cost, $image, $type)
    {
        $sql = "UPDATE ao SET name=:name, description=:description, sale=:sale, sale_price=:sale_price, cost=:cost, image=:image, type=:type WHERE id=:id";
        $stmt = $pdo->prepare($sql);
    
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':description', $description, PDO::PARAM_STR);
        $stmt -> bindValue(':sale', $sale, PDO::PARAM_STR);
        $stmt -> bindValue(':sale_price', $sale_price, PDO::PARAM_INT);
        $stmt -> bindValue(':cost', $cost, PDO::PARAM_INT);
        $stmt -> bindValue(':image', $image, PDO::PARAM_STR);
        $stmt -> bindValue(':type', $type, PDO::PARAM_STR);

        if($stmt->execute())    
        {
            //$this->id = $pdo->lastInsertID();
            return true;
        }
    }          
    
    public function delete($pdo, $id)
    {
        $sql = "DELETE FROM ao WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute())
        {
            return true;
        }
    }

    public static function increase($pdo)
    {
        $sql = "SELECT * FROM ao ORDER BY sale_price ASC ";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

    public static function decrease($pdo)
    {
        $sql = "SELECT * FROM ao ORDER BY sale_price DESC ";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function type($pdo, $type)
    {
        $sql = "SELECT * FROM ao WHERE type=:type ";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':type', $type, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }

}
?>