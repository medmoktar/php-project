<?php
require "connect.php";

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $price=$_POST['price'];
    $quantite=$_POST['qt'];

    $tm=md5(time());

    $fn=$_FILES['im']['name'];
    $dst= "./images/".$tm.$fn;
    $dst1="controller/images/".$tm.$fn;
    move_uploaded_file($_FILES['im']['tmp_name'],$dst);

    $req="INSERT INTO product(nom,price,quantite,images) VALUES(?,?,?,?)";
    $res=$conx->prepare($req);
    $res->bind_param('ssss',$nom,$price,$quantite,$dst1);
    
    if($res->execute()){?>
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
}


?>