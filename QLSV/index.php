session_start();
$name; $pass;
$error;

if (isset($_POST['submit'])){
$name = $_POST['username'];
$pass = $_POST['password'];

require './Database/database.php';

$query = "SELECT * FROM users WHERE username = :name";

$records = $db->prepare($query);
$records->bindParam(':name',$name);
$records->execute();

$user = $records->fetch(PDO::FETCH_ASSOC);

if (count($user)>0 and $user['password'] ==$pass){
#login successfully
$_SESSION['user'] = $user['username'];
header('location:...'); //ket noi voi man hinh chinh
}else{
$error = 'Wrong username or password!';
}
}<?php



