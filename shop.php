<?php
session_start();


if( trim($_SESSION['username']) == '')
{ echo '<h1>請先登入會員</h1><br>'; 
header('Refresh: 5; url=hw1.html');die;
die; }

echo '<h1>會員：'. $_SESSION["username"] . '</h1><br>';
if (isset($_GET['Items']))
{
array_push($_SESSION['cart'],$_GET['Items']);	
}
$cart = $_SESSION['cart'];
$cartlength = count($cart);
$arr = array(0,0,0,0,0,0);
echo '購買順序：<br>';
for ($i = 0 ; $i < $cartlength ; $i++)
{
 echo '商品'.$cart[$i].',';
 if(strcmp ($cart[$i],"1") == 0) $arr[0]++;
 if(strcmp ($cart[$i],"2") == 0) $arr[1]++;
 if(strcmp ($cart[$i],"3") == 0) $arr[2]++;
 if(strcmp ($cart[$i],"4") == 0) $arr[3]++;
 if(strcmp ($cart[$i],"5") == 0) $arr[3]++;
 if(strcmp ($cart[$i],"6") == 0) $arr[3]++;
}
echo '<br>';
echo '<br>';
echo '<table border="1"><tr>';
echo '<td>一號商品</td>';
echo '<td>'. $arr[0].'</td></tr>';
echo '<tr><td>二號商品</td>';
echo '<td>'. $arr[1].'</td></tr>';
echo '<tr><td>三號商品</td>';
echo '<td>'. $arr[2].'</td></tr>';
echo '<tr><td>四號商品</td>';
echo '<td>'. $arr[3].'</td></tr>';
echo '<tr><td>五號商品</td>';
echo '<td>'. $arr[4].'</td></tr>';
echo '<tr><td>六號商品</td>';
echo '<td>'. $arr[5].'</td></tr>';
echo '</table>';

echo '<br>';
echo '<br>';
echo '<form action="hw1.html"><input type="submit" value="返回" ></form>';
