<?php
require "connect.php";
$id=$_GET['id'];
$req="DELETE FROM clien WHERE id=?";
$res=$conx->prepare($req);
$res->bind_param('i',$id);
$res->execute();
header("Location:../Display-custumer.php");
exit;
?>