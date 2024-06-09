<?php 
$mail=$_POST["m"];
$pass_w=$_POST["p"];



require "connect.php";

$req="SELECT user,pass_word FROM login ";
$res= $conx->query($req);

$d=0;
while($row=mysqli_fetch_row($res)){
    
    if($row[0]==$mail and $row[1]==$pass_w){
         $d=1;
    }
 }
session_start();
if($d==1){
    $_SESSION['email'] = $mail;
    $_SESSION['log']= true;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload=function(){
            Swal.fire({
                title:"succed!",
                text:"insertion avec success",
                icon:"success"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../home.php";
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
                text:"error incorrect email or passward",
                icon:"error"
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location="../login.php";
                }
            })
        }
      </script>
   <?php }

?>