<?php include('layout/header.php'); ?>
    <?php
        if(!empty($_SESSION) && $_SESSION['user_logged'] == 'successful'){
            header('Location:index.php');
        }
    ?>
    <form action="db.php" method="POST">
        <h1>Login form</h1>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <?php include('layout/footer.php'); ?>