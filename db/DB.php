<?php
    try{
        $connection=new PDO('mysql:host=localhost;dbname=eshop','root','');
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }

    function getUser($login){
        global $connection;
        try {
            $query = $connection ->prepare(
                "SELECT u.id,u.password,u.fullname,r.rolename,r.code
                        FROM users u INNER JOIN roles r ON u.role_id = r.id
                        WHERE login =?");
            $query->execute([$login]);
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }

        return $query->fetch();
    }

    function getAllCategories(){
        global $connection;
        $query = $connection->prepare("select * from categories");
        $query->execute();
        return $query->fetchAll();
    }

    function getAllGoods(){
        global $connection;
        $query = $connection->prepare("
        SELECT g.id,g.name, g.description,g.price,g.qty,g.image,c.name as cname
        FROM goods g 
        INNER JOIN categories c ON g.category_id = c.id");
        $query->execute();
        return $query->fetchAll();
    }

    function registerUser($login,$password,$fullname){
        global $connection;
        try {
            $query = $connection->prepare("Insert INTO users VALUES (:id,:login,:password,:fullname,:role_id)");
            $query ->execute(
                array(
                    'id'=>null,
                    ':login'=>$login,
                    ':password'=>$password,
                    ':fullname'=>$fullname,
                    ':role_id'=>1
                )
            );
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }
    }

    function addGood($name,$description,$price,$qty,$image,$category_id){
        global $connection;
        try {
            $query = $connection->prepare("insert into goods(name,description,price,qty,image,category_id) values (?,?,?,?,?,?)");
            $query ->execute([$name,$description,$price,$qty,$image,$category_id]);
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }

    function addCategory($name,$description){
        global $connection;
        try {
            $query = $connection->prepare("insert into categories(name,description) values (?,?)");
            $query ->execute([$name,$description]);
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }

    function getGoodsCount($cid){
        global $connection;
        try {
            $query = $connection ->prepare("SELECT count(*) FROM goods WHERE category_id=?");
            $query->execute([$cid]);
            $res = $query->fetch();
        }catch (Exception $exception){
            echo $exception->getMessage();
        }

        return $res[0];
    }

    function deleteCategory($id){
        global $connection;
        if (getGoodsCount($id)>0){
            return false;
        }
        try {
            $query = $connection ->prepare("DELETE FROM categories WHERE id=?");
            $query ->execute([$id]);
        }catch (Exception $exception){
            echo $exception->getMessage();
        }

        return true;
    }

    function getGoodByCat($cid){
        global $connection;
        try {
            $query = $connection->prepare("SELECT * FROM goods WHERE category_id =?");
            $query->execute([$cid]);
            $res = $query->fetchAll();
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }
        return $res;
    }

function getGood($id){
    global $connection;
    try {
        $query = $connection->prepare("SELECT * FROM goods WHERE id =?");
        $query->execute([$id]);
        $res = $query->fetch();
    }
    catch (Exception $exception){
        echo $exception->getMessage();
    }
    return $res;
}

function buyGood($uid,$gid,$gnum){
    global $connection;
    try {
        $query = $connection->prepare("Insert INTO basket VALUES (:id,:uid,:gid,:gnum)");
        $query ->execute(
            array(
                'id'=>null,
                ':uid'=>$uid,
                ':gid'=>$gid,
                ':gnum'=>$gnum
            )
        );
    }
    catch (Exception $exception){
        echo $exception->getMessage();
    }
}
