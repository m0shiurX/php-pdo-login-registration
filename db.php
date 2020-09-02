<?php
session_start();
$host = 'localhost';
$db_name = 'chuadanga_users';
$user = 'root';
$pass = '';

try {
    
    $dbc = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    // START
        // LOGIN
        if(!empty($_POST) && !isset($_POST['first_name'])){
            
            if(isset($_POST['email']) && isset($_POST['password'])){

                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $sql = $dbc->prepare("SELECT id, first_name, last_name, email, password FROM user_info WHERE email = ?");
                $sql->execute([$email]);
                $result = $sql->fetch();
                if($result != null){

                    $db_pass = $result['password'];
                    if(password_verify($password, $db_pass)){

                        echo "Successfully logged in!";
                        $_SESSION['user_logged'] = 'successful';
                        $_SESSION['user_email'] = $result['email'];
                        $_SESSION['user_name'] = $result['first_name'].' '.$result['last_name'];

                        header('Location:index.php');

                    }else {
                        echo "Invalid password!";
                    }

                }else{
                    echo "Sorry, user not found!";
                }

            }


        }
        // REGISTRATION
        if(!empty($_POST) && isset($_POST['first_name'])){

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_BCRYPT);
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $date_of_birth = $_POST['date_of_birth'];
            $ref_code = $_POST['ref_code'];
            

            $sql = $dbc->prepare("INSERT INTO user_info (first_name,last_name,email,password,gender,country,state,city,phone,ref_code,date_of_birth) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $sql->execute([$first_name, $last_name, $email, $password, $gender,$country,$state,$city,$phone,$ref_code,$date_of_birth]);
            
            $last_id = $dbc->lastInsertId(); // Works only when inserting
            header('Location:login.php');

        }
    // END
    
    $dbc = null;

} catch (PDOException $e) {
    echo "Connection failed. ".$e->getMessage();
    die();
}

