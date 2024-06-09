<?php
require "connect.php";
if(isset($_GET['id'])) {
//    $id1=$_GET['id1'];
//    $id2=$_GET['id2'];
//    $id3=$_GET['id3'];
//    echo $id1;
//    echo $id2;
//    echo $id3;
$data=$_GET['id'];
$dataArray = explode(",", $data);

for($i=0;$i<count($data);$i++){
    echo"$data";
}

//    $upq = $_POST['q'];
//    $q=$_POST['quantite'];
// //    $ups=explode(",",$_POST["selectedOptions"]);
//    $ups=$_POST['quantities_sold'];
//    echo$ups;
//    for($i=0;$i<count($upq);$i++){
//     $product_info = explode("|",$upq[$i]);
//     $product_name = $product_info[0];
//     echo $_POST["quantities_sold['']"];
// }
//     $product_price = $product_info[1];
//     $product_iq = intval($product_info[2]);
//     $ud= isset($ups[$i]) ? $ups[$i] : "";
//     echo$product_name,$product_price,$product_iq,$ud;}
//     $product_upq = intval($product_info[3]);
//     $product_totalq = $product_iq-$product_upq;
//    $req ="UPDATE product SET quantite='$product_totalq' WHERE nom = '$product_name'";
//    $res=$conx->query($req);
//    if($res){
    // 
//     <script>alert("<?= $product_totalq ")</script>
//    
//    
}
?>