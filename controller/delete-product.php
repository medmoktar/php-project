<?php
require "connect.php";
$id=$_GET['id'];
$req="DELETE FROM product WHERE id=?";
$res=$conx->prepare($req);
$res->bind_param('i',$id);
$res->execute();
header("Location:../Display-Product.php");
exit;
?>