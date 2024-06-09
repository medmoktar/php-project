<?php
require "connect.php";

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $tel=$_POST['tel'];
    $prenom=$_POST['prenom'];

    $req="INSERT INTO clien(nom,prenom,tel) VALUES(?,?,?)";
    $res=$conx->prepare($req);
    $res->bind_param('sss',$nom,$prenom,$tel);
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
                    window.location="../Display-custumer.php";
                }
            })
        }
      </script>
   <?php }
}


?>