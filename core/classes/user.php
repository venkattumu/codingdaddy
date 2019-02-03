<?php

class User{
    protected $con;

    function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function checkInput( $var)
    {
       $var = htmlspecialchars($var);
       $var = trim($var);
       $var = stripcslashes($var);

       return $var;
    }
    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password ");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();

        if($count > 0){
            $_SESSION['user_id'] = $user->user_id;
            header("location: home.php");
        } else {
            return false;
        }   
    }

    // public function register($email, $password, $screenName)
    // {
    //     $stmt = $this->pdo->prepare("INSERT INTO `users` ( `email`, `password`, `screenName`)
    //                      VALUES( :email, :password, :screenName) ");
    //     $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    //     $stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
    //     $stmt->bindParam(":screenName", $screenName, PDO::PARAM_STR);

    //     $stmt->execute();
    //     $user_id = $this->pdo->lastInsertId();
    //     $_SESSION['user_id'] = $user_id;
    // }

    public function userData($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        header("location: ../index.php");
    }

    public function create($table, $fields = array())
    {
       $columns = implode(',', array_keys($fields));
       $values = ':'.implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values}) ";

        if($stmt = $this->pdo->prepare($sql)){
            foreach($fields as $key => $data){
                $stmt->bindValue(':'.$key, $data); 
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();
        }


       
    }

    public function checkEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            return true;
        } else{
            return false;
            header("location: home.php");
        }

    }

    
}

?>