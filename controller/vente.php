<?php
require "connect.php";

$id=$_GET['id'];
$req="SELECT*FROM result_order WHERE id=$id";
$res=$conx->query($req);
while($row1=$res->fetch_assoc()){
    $id=$row1['id'];
    $product=$row1['product'];
    $United_Price=$row1['United_Price'];
    $Quantity=$row1['Quantity'];
    $Rising=$row1['Rising'];
    $req4="INSERT INTO vente_order(id,product,United_Price,Quantity,Rising) VALUES ($id,'$product',$United_Price,'$Quantity',$Rising)";
    $res4=$conx->query($req4);
}
$req5="DELETE FROM result_order  WHERE id=$id";
$res5=$conx->query($req5);

$req1="SELECT*FROM facture WHERE id=$id";
$res1=$conx->query($req1);
while($row=$res1->fetch_assoc()){
    $numero=$row['numero'];
    $nom_clien=$row['nom_clien'];
    $Date_c=$row['Date_c'];
    $price_total=$row['price_total'];
    $req2="INSERT INTO vente(id, numero, nom_clien, Date_c, price_total) VALUES ($id,'$numero','$nom_clien','$Date_c',$price_total)";
    $res2=$conx->query($req2);
}

$req3="DELETE FROM facture WHERE id=$id";
$res3=$conx->query($req3);

if($res3){?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.onload=function(){
                Swal.fire({
                    title:"succed!",
                    text:"insertion avec success",
                    icon:"success"
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location="../sale.php";
                    }
                })
            }
        </script>

<?php } ?>