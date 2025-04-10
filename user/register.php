<?php 
    include("./connection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $full_name = $_POST["full_name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $phone = $_POST["phone"];

        $uploadDir = '../uploads/'; 
        $fileName = time() . '_' . basename($_FILES['image']['name']); 
        $uploadFile = $uploadDir . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

        $adminpw="admin123x";
        $passwordOfAdmin=$_POST["admin"];
        $admin=$_POST['adminpw'];
        if($adminpw == $passwordOfAdmin){
            $sql = "INSERT INTO users (full_name, username, password, email, age, phone, image,admin) VALUES ('$full_name', '$username', '$password', '$email', '$age', '$phone', '$uploadFile','$admin')";
        }else{
            $sql = "INSERT INTO users (full_name, username, password, email, age, phone, image,admin) VALUES ('$full_name', '$username', '$password', '$email', '$age', '$phone', '$uploadFile','null')";
        }

        $conn->query($sql);
        header("Location: login.php");

    }
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <title> Register Page</title>
    /* --------------------------------- </head> -------------------------------- */
    <body>
        <h2>Register New Account</h2>
        <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" required><br><br>

        <label for="username">User Name</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br><br>

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="age">Age</label>
        <input type="number" name="age" id="age" required><br><br>

        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" id="phone" required><br><br>

        <label for="image">Your Image *(Not required)</label>
        <input type="file" name="image" id="image"><br><br>

        <label for="admin">Enter Password If u want To Admin</label>
        <br>
        <input type="password" name="admin" id="admin"><br><br>

        <label for="adminpw">Enter Password for Admin</label>
        <br>
        <input type="password" name="adminpw" id="adminpw"><br><br>

        <button type="submit">Register</button>
        </form>
            <br>
        <a href="login.php">U have already Account ?</a>
    </body>
</html>