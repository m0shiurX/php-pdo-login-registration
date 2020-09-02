<?php include('layout/header.php'); ?>
        
<?php

    if(!empty($_SESSION) && $_SESSION['user_logged'] == 'successful'){ 
        $name = $_SESSION['user_name'];
        $email = $_SESSION['user_email'];
        ?>

        <h1>Welcome <?php echo $name; ?>!</h1>
        <p><?php echo $email; ?></p>

        <p><a href="logout.php">Logout</a></p>

    <?php
    } else {
        session_unset();
        header('Location:login.php');
    }
?>
<?php include('layout/footer.php'); ?>