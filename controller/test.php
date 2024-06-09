
<?php
require "connect.php";
$data=$_POST['register'];
$id=$_POST['id'];

for($i=0;$i<count($data);$i++){
    $dataArray = explode(",", $data[$i]);
      
}

for($i=0;$i<count($id);$i++){
    $idArray = explode(",", $id[$i]);
      
}

// for($i=0;$i<count($idArray);$i++){
//     echo $idArray[$i];
      
// }
$number=$_POST['numero'];
$custumer=$_POST['custumer'];
$res6=$conx->query("SELECT*FROM clien");
$d=0;
while($row6=$res6->fetch_assoc()){
    
    
    
    if(($row6['nom']." ". $row6['prenom'])==$custumer){
        $d=1;
    }
}

if($d==0){ ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload=function(){
                Swal.fire({
                    title:"error!",
                    text:"custmer is Empty",
                    icon:"error",
                }).then((result)=>{
                    if(result.isConfirmed){
                    window.location="../add-Invoice.php";
                }
                })
            }
</script>
<?php }
else{
$total=$_POST['total'];
$req="INSERT INTO facture(numero,nom_clien,price_total) VALUES('$number','$custumer',$total)";
$res=$conx->query($req);
 
$req1="SELECT id FROM facture WHERE numero='$number'";
$res1=$conx->query($req1);
$row1=$res1->fetch_assoc();

for($i=0;$i<count($dataArray);$i++){
    $x=$dataArray [$i];
    // echo $x;
    $id= $idArray[$i];
    $req2="SELECT*FROM product WHERE id=$id";
    $res2=$conx->query($req2);
    while($row=$res2->fetch_assoc()){
        $nom= $row['nom'];
        $price= $row['price'];
        $q= $row['quantite'];
        $t=$q-$x;
        $r=$price*$x;
        $id_facture=$row1['id'];
        $req3="UPDATE product SET quantite='$t' WHERE id=$id";
        $res3=$conx->query($req3);
        $req4="INSERT INTO result_order(id,product,United_Price,Quantity,Rising) VALUES($id_facture,'$nom','$price','$x','$r')";
        $res4=$conx->query($req4);
        
    }




    
    
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload=function(){
        Swal.fire({
            title:'succed!',
            text:'order success',
            icon:'success'
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href="../add-Invoice.php";
            }
        })
    }
</script>

<?php }} ?>