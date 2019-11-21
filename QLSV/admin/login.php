<?php
session_start();

require './DB/connectDB.php';
$name; $pass;
$error;

if (isset($_POST['submit'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];


    $query = "SELECT * FROM users WHERE username = :name";

    $records = $db->prepare($query);
    $records->bindParam(':name',$name);
    $records->execute();

    $user = $records->fetch( PDO::FETCH_ASSOC);

    if (count($user)>0 and $user['password'] ==$pass){
        #login successfully
        $_SESSION['user'] = $user['username'];
        header('location:...'); //ket noi voi man hinh chinh
    }else{
        $error = 'Wrong username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Import Boostrap css, js, font awesome here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <title>Đăng nhập</title>
</head>
<body>
<div class="container" id="login">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger error">
            <strong></strong> Tài khoản hoặc mật khẩu sai.
        </div>
    <?php endif ?>

    <div id="top">
        <i class="fas fa-laptop"></i>
    </div>
    <div id="tbody">
        <div >
            LOGIN
        </div>
        <form method="post">

            <label for="username">
                <i class="fas fa-user text-white"></i>
            </label>
            <p><input id="username" type="text" name="username" placeholder="Username" ></p>
            <label for="password">
                <i class="fas fa-lock text-white"></i>
            </label>
            <p><input id="password" name="password" type="password" placeholder="Password"></p>

            <p id="them"><a href="#">Forgot password?</a>
                <label for="remember_me">Remember me</label>
                <input id="remember_me" type="checkbox"></p>
            <div id="submit">
                <input id="submit_bt" type="submit" name="submit" value="Login">
            </div>


        </form>
    </div>
</div>
<div></div>
</body>
</html>

