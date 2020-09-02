<?php include('layout/header.php'); ?>
    <?php
        if(!empty($_SESSION) && $_SESSION['user_logged'] == 'successful'){
            header('Location:index.php');
        }
    ?>
    <form action="db.php" method="POST">
        <h1>Registration form</h1>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="country" placeholder="Country" required>
        <select name="gender" required>
            <option value="">Choose your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Others</option>
        </select>
        <input type="date" name="date_of_birth" required>
        <input type="text" name="state" placeholder="State">
        <input type="text" name="city" placeholder="City">
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="text" name="ref_code" placeholder="Reference Code">
        <input type="reset" value="Reset">
        <input type="submit" value="Register">
    </form>

    <?php include('layout/footer.php'); ?>

