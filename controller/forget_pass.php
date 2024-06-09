<?php
$m=$_POST['mail'];
 
require "connect.php";

$req="SELECT user,pass_word FROM login ";
$res= $conx->query($req);
$d=0;
while($row=mysqli_fetch_row($res)){
    $pas=$row[1];
    if($row[0]==$m){
       $d=1;
    }
}

if($d==1){
   $mail= mail($m,"forget password","your password is : $pas","From: medmoktar239@gmail.com");
   if($mail){?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        window.onload=function(){
            Swal.fire({
                title:"succed!",
                text:"Check your email",
                icon:"success"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../login.php";
                }
            })
        }
      </script>
      <?php }
    else{?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        window.onload=function(){
            Swal.fire({
                title:"error!",
                text:"error sending message",          
                icon:"error"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../forgot-password.php";
                }
            })
        }
      </script>
   <?php }
}
else{?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        window.onload=function(){
            Swal.fire({
                title:"error!",
                text:"error incorrect email ",
                icon:"error"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../forgot-password.php";
                }
            })
        }
      </script>
   <?php }?>