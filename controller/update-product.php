<?php
require "connect.php";

if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $nom=$_POST['nom'];
    $price=$_POST['price'];
    $quantite=$_POST['qt'];
    $res2=$conx->query("SELECT*FROM product WHERE id=$id");
    $row2=$res2->fetch_assoc();
    // $quantity=$quantite+$row2['quantite'];
    if($quantite ==""){
        $quantity=$row2['quantite'];  
    }else{
        
        $quantity=$quantite+$row2['quantite'];
    }
    if($quantity<0){?>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         
        window.onload=function(){
            Swal.fire({
                title:"error!",
                text:"The finel quantity is negatif",
                icon:"error"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href=`../edit-product.php?id=<?= $id ?>`;
                    
                }
            })
            
        }
      </script>
      
    <?php }
    else{
    $tm=md5(time());

    $fn=$_FILES['im']['name'];
    $dst= "./images/".$tm.$fn;
    $dst1="controller/images/".$tm.$fn;
    move_uploaded_file($_FILES['im']['tmp_name'],$dst);

    $req="UPDATE product SET nom='$nom',price='$price',quantite='$quantity',images='$dst1' WHERE id=$id";
    $res=$conx->query($req);
    if($res){?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        window.onload=function(){
            Swal.fire({
                title:"succed!",
                text:"insertion avec success",
                icon:"success"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../Display-Product.php";
                }
            })
        }
      </script>
   <?php }
}}


?>