<?php
session_start();
$host="localhost";
$db_user="root";//用户名
$db_pass="";//密码
$db_name="test";//数据库
//$timezone="Asia/Taipei";
//$code = trim($_POST['code']);
$_SESSION['cart'] = array();
//if($code==$_SESSION["helloweba_num"]){

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: "  . mysqli_connect_error());
} 
mysqli_set_charset($conn, 'utf8');
$username = stripslashes(trim($_POST['name']));
//检测用户名是否存在
$sql = "select * from customer where username='$username'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
	$conn->close();
	echo '<h1>帳號不存在，請換其他帳號</h1><br>'; header('Refresh: 3; url=hw1.html');die;
}
$row = mysqli_fetch_assoc($result);

$password = md5(trim($_POST['password']));
if( strcasecmp($row["password"], $password )!= 0){
    $conn->close();
	echo '<h1>密碼輸入錯誤。</h1><br>'; header('Refresh: 3; url=index.php');die;
} 
if (strcasecmp($sername,"root" )!= 0)
{
	
mysqli_close($conn);
$_SESSION["username"]=$username;
echo '<h1>歡迎會員'. $_SESSION["username"] . '</h1><br>';
header('Refresh: 5; url=hw1.html');die;


}
else
{
mysqli_close($conn);
$_SESSION["username"]=$username;
echo '<h1>歡迎管理員'. $_SESSION["username"] . '</h1><br>';
header('Refresh: 5; url=hw1.html');die;

}


?>


