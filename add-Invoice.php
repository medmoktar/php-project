
<?php require "navbar.php"?>

<head>
    
    <style>
        
        .form-select {
            width: 100%;
            margin-top: 10px;
            /* margin-left: 80px; */
        }

        .col{
            width: 100%;
            margin-top: 10px;
            /* margin-left: 80px;  */
        }
        
        .form-number{
            width: 100%;
            margin-top: 10px;
            /* margin-left: 80px; */
        }

        #fr{
            margin-top: 0px;
            height: 100%;
            width: 80%;
            margin-left: 10%;
            /* background: red; */
            /* width: 1%; */
        }

        #button{
            margin-top: 25px;
            /* margin-left: 80px; */
            /* margin-right:50% ; */
        }

        .a{
            margin-top: 8%;
            /* width: 500px; */
            /* height: 50%; */
            /* background: whitesmoke; */
            /* border-radius: 10px; */

            /* border: 3px solid  */
            /* margin-left: 37%;
            margin-right: 30%;
            border: 20px;
            border-color:black; */
            

        }

        .command{
          background: #212529 !important;
          color: white;
          text-align: center;
          height: 100%;
          border-radius: ;
          padding: 6px;
          height:100px;
          size: 20px;
          font-size: 25px;
        }

        .nb{
            display: flex;
        }
        .p{
            margin-left: 6%;
            margin-top: 2%;
            border: none;
            height: 15px;
        }
        p{
            margin-left: 10px;
            display: flex;
        }
        p span{
            margin-left: 4%;
        }
        .b{
            margin-left: 5%;
            /* margin-top: -28%; */
        }

        /* .c{
            height: 560px;
            
        } */
        .g{
            /* margin-right: 30%; */


        }

        #n{
         margin-left: 30%;
        }

        

    </style>
</head>

    <div class="col-lg-9">
        <div class="container a">
            
            <div class="card " style="width:80%; margin-left:8%;">
                    
                <div class="card-header bg-dark text-white text-center  ">
                    <h1>Create Order</h1>
                </div>    
                <div class="card-body" style=""> 
                    <div class="" style="display:flex">
                        <div class="fw-bold" style="margin-left:10%">
                            <p>OrderNumber:</p>
                        </div>
                        
                        <?php $numeroCommande = "CMD" . date("YmdHis") . mt_rand(1, 999);?> 
                            <p id="n"><?= $numeroCommande ?></p>
                        
                    </div>   
                    <form action="controller/test.php" class="g" method="post" id="fr" >
                
                    <input type="hidden" id="nb" name="numero" value=""  >
                        
                    <input type="hidden" id="r" name="register[]" value="" readonly> 
                    <input type="hidden" id="i" name="id[]" value="" readonly> 
                        <select class="form-select t" name="custumer" aria-label="Default select example">
                            <option selected>Custumer</option>
                            <?php 
                                require "controller/connect.php";
                                $req="SELECT*FROM clien ";
                                $res=$conx->query($req);
                            while($row=$res->fetch_assoc()){    
                            ?>
                            <option value="<?=$row['nom']?> <?=$row['prenom']?>"><?=$row['nom']?> <?=$row['prenom']?></option>
                            <?php } ?>
                        </select>
                        <div id="quantitiesSoldFields"></div>

                        <select class="form-select my-2" id="select" name="q[]" size="3"   aria-label="size 3 select example" multiple>
                            <option selected>Products</option>
                            <?php 
                                require "controller/connect.php";
                                $req="SELECT*FROM product";
                                $res=$conx->query($req);
                                while($row=$res->fetch_assoc()){
                            ?>
                                <option value="<?= $row['id']?>" data-price="<?=$row['price']?>" data-quantity="<?=$row['quantite']?>" data-upq="" ><?=$row['nom']?> </option>
                                <?php } ?>
                        </select>
                        <div class="form-group my-2 ">
                            <label for="">Quantity</label>
                           <div class="d-flex"> 
                            <input type="number" id="quantity" name="quantite[]"  class="form-control" placeholder="Enter quantity"  >
                            <button type="button" class="btn btn-primary b" ><a onclick="quantity()">Success</a></button>
                           </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Total Price</label>
                            <input type="text" class="form-control" name="total" id="total" placeholder="0" readonly>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" onclick="envoyer()" class="btn btn-primary" id="button">Submit</button>
                        </div>    
                    </form>
                </div>    
            </div>   
        </div> 
    </div>
</div>         
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var quantitiesSold = [];
    var product=[];
    
    function quantity(){
        var q=Number(document.getElementById('quantity').value);
        var select= document.getElementById('select');
        var option= select.options[select.selectedIndex];
        var price= Number(option.getAttribute('data-price'));
 
        var id = option.value;
        product.push(id);
        document.getElementById('i').value=product;
        quantitiesSold.push(q);
        var d=Number( option.getAttribute('data-quantity'));
        if(d<q){
            event.preventDefault();
                Swal.fire({
                    title:"error!",
                    text:"This quantity does not exist",
                    icon:"error",
                }).then((result)=>{
                    if(result.isConfirmed){
                    window.location="add-Invoice.php";
                }
                })
            
            
        }
        else if(q<0){
            event.preventDefault();
                Swal.fire({
                    title:"error!",
                    text:"The quantity can't be negative",
                    icon:"error",
                }).then((result)=>{
                    if(result.isConfirmed){
                    window.location="add-Invoice.php";
                }
                })
        }
        
        var total= document.getElementById('total');
        var totalprice =Number(total.value);
        
        totalprice+=price*q;
        
        total.value=totalprice;
        document.getElementById('quantity').value="";
        
        return quantitiesSold ;
    }

    // function envoyer(){
        
    //     // console.log(quantitiesSold)
    //     fetch('controller/add-invoice.php',{
    //         method:'POST',
    //         headers:{
    //             'Content-Type':'application/json',
    //         },
    //         body: JSON.stringify(quantitiesSold),
    //         }).then(reponse=>{
    //             if(reponse.ok){
    //                 return reponse.text();
    //             }
    //             throw new Error('Erreur lors de la requete');
            
    //         }).then(data=>{
    //             console.log(data);
    //         }).catch(error=>{
    //             console.log('Erreur:',error)
    //         });
    //         console.log("succed") ;
    // }
//     function envoyer() {
//         // console.log(quantitiesSold);
//     //  let user = {
//     //     "username":"mike",
//     //     "password":"mike560",
//     //     "gender":"male",
//     //  }   

//     fetch("controller/test.php", {
//         "method": "POST",
//         "headers": {
//             "Content-Type": "application/json; charset=utf-8"
//         },
//         "body": JSON.stringify(quantitiesSold)
//     })
//     .then(function(reponse){
//         return reponse.text();
//     })
//     .then(function(data){
//         console.log(data);
//         // console.log("succed");
//     })
//     // console.log(quantitiesSold);
// }

//     function updateQuantitiesSoldFields() {
//     var quantitiesSoldFields = document.getElementById('quantitiesSoldFields');
//     quantitiesSoldFields.innerHTML = ''; // Effacer les anciens champs

//     // Parcourir les entrées de quantitiesSold et générer les champs de formulaire cachés
//     for (var productName in quantitiesSold) {
//         if (quantitiesSold.hasOwnProperty(productName)) {
//             var input = document.createElement('input');
//             input.type = 'hidden';
//             input.name = 'quantities_sold[' + productName + ']';
//             input.value = quantitiesSold[productName];
//             quantitiesSoldFields.appendChild(input);
//         }
//     }
// }
// total=total+p*q; t=1000*2
// t=t+500*3
//    function updatequantity(option){
//     var quantity=document.getElementById('quantity');
//     quantity.value=0;
//     // var pricetotal=document.getElementById('total').value;
    
//     updateTotal();
//     option.setAttribute('data-upq',quantity.value);
//     var upq=option.getAttribute('data-upq');
//     console.log(upq);
//    }

// //    var totalprice = Number(total.value) ;
// //    var  total= document.getElementById('total').value;
// //     totalprice+=total;
// //     total.value=totalprice;

//     function updateTotal(){
//     var  select= document.getElementById('select');
//     var  option= select.options[select.selectedIndex];
//     var  price= Number(option.getAttribute('data-price'));
//     var  q =  option.getAttribute('data-quantity');
//     var  total= document.getElementById('total');
//     var quantity=document.getElementById('quantity');
//     // quantity.max=`${x}`;
//     // console.log(quantity.max);
//     // q=quantity.value;
    
//     if(quantity && price){
//         quantity.max=q;
//         // quantity.value=1;
//        var p=Number(quantity.value);
//         totalprice =Number(total.value);
//         // console.log(price);
//         // if(q)
//         totalprice += price*p;
//         total.value=totalprice;
   //}
    // option.setAttribute('data-upq', p);
    // var upq=option.getAttribute('data-upq');
    //  console.log(upq);
    
    
    
   // }
// function envoyer(){
        // var x =document.getElementById("select");
        // var y =x.selectedOptions;
        // var z=x.getAttribute("data-upq");
        // var data=[];
        // for(let i=0;i<y.length;i++){
        //     // var data_upq = y[i].dataset.upq;  
        //   var data_upq = y[i].getAttribute("data-upq");
        //   console.log(data_upq)
        //   if(data_upq){
        //   data.push(data_upq);}
        //   console.log(data[0]);
        // };

    function envoyer(){
        
        // c=document.getElementById("")
        var n = document.getElementById('n').innerHTML;
        document.getElementById('nb').value = n;
        document.getElementById('r').value=quantitiesSold;
        // event.preventDefault();
        //  window.location= `controller/test.php?numero=${n}`;
           
        
    }

        
    
        // JavaScript pour récupérer les valeurs de data-quantity
        // document.getElementById("fr").addEventListener("submit", function() {
        //     var select = document.getElementById("select");
        //     var selectedOptions = [];
        //     for (var i = 0; i < select.options.length; i++) {
        //         if (select.options[i].selected) {
        //             // var optionValue = select.options[i].value;
        //             var quantity = select.options[i].getAttribute("data-upq");
        //             console.log(quantity);
        //             selectedOptions.push(quantity);
        //         }
        //     }
        //     // Ajoutez un champ caché pour envoyer les valeurs à la page PHP
        //     var hiddenInput = document.createElement("input");
        //     hiddenInput.setAttribute("type", "hidden");
        //     hiddenInput.setAttribute("name", "selectedOptions");
        //     hiddenInput.setAttribute("value", selectedOptions.join(","));
        //     this.appendChild(hiddenInput);
        // });
    

 </script>
 </body>
 </html>