<?php
require "connect.php";

if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $nom=$_POST['nom'];
    $tel=$_POST['tel'];
    $prenom=$_POST['prenom'];

    $req="UPDATE clien SET nom='$nom',prenom='$prenom',tel='$tel' WHERE id=$id";
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
                    window.location="../Display-custumer.php";
                }
            })
        }
      </script>
   <?php }
}


?>