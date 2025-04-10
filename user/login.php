<?php 
    session_start();
    include("./connection.php");
    $state = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $resultCheck = $conn->query($sql);
        $resultId = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultId) > 0) {
            $row = mysqli_fetch_assoc($resultId);
            $_SESSION['id'] = $row['id'];
        }

        $sql_Full_Name = "SELECT full_name FROM users WHERE username = '$username'";
        $resultFull_Name = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultFull_Name) > 0) {
            $row = mysqli_fetch_assoc($resultFull_Name);
            $full_name = $row['full_name'];
        }

        if ($resultCheck->num_rows > 0) {
            $user = $resultCheck->fetch_assoc(); 
            if ($password == $user['password']) {
                $state = true;
                $_SESSION['state'] = $state;
                $_SESSION['full_name'] = $full_name;
                $result = $conn->query($sql);
                $user = $result->fetch_assoc();
                $_SESSION['image'] = $user["image"];
                header("Location: ../index.php");
            } else {
                $state = false;
            }
        } else {
            $state = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
    </head>
    <body>
        <h2>Login With Account</h2>
        <form method="post" action="">
            <label for="username">User Name</label>
            <input type="text" name="username" required><br><br>

            <label for="password">password</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>
        <br>
        <a href="register.php">U dont have account !</a>
        <br>
        <a href="admin.php">U Are Admin !</a>
    </body>
</html>