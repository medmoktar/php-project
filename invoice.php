<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .bk{
            margin-top: 60px;
        }
        .invoice{
            background: #212529 !important;
            color: white;
            text-align: center;
            font-size: 30px;
        }
        .nb{
            margin-left: 2%;
            margin-top: 2% ;
        }
        /* .nb span{
          font-size: 22px;
        } */
        .Tot{
            padding: 20px;
            font-size: 20px;
        }
        
        

        .cl{
            /* font-size: 20px; */
            text-align: center;
            /* margin-top: -10px; */
            /* background: red; */
        }
        /* .cl span{
            font-size: 22px;
        } */
        .dt{
            text-align: center;
            margin-top: -10px;
            font-size: 15px;
        }
        /* .dt span{
            font-size: 20px;
        } */
        .buton{
            text-align: center;
        }
        .bt{
            border-radius: 5px;
            border: none;
            padding: 10px;
            background:#212529 !important ;
            color: white;
            align-items: center;
        }

        .bt:hover{
            background: whitesmoke;
            color: black;
        }

    </style>
</head>
<body>
    <?php
     require "controller/connect.php";
        $id=$_GET['id'];
        $req= "SELECT*FROM vente WHERE id=$id";
        $res=$conx->query($req);
        $row=$res->fetch_assoc();
    ?>
    <div class="container">
        <div class="card  marge10 form-disable bk">
            <div class="invoice">Invoice</div>
            <p class="nb"><span class="fw-bold">Invoice Number</span> : <?= $row['numero'] ?></p>
            <p class="cl"><span class="fw-bold">Custumer</span> : <?= $row['nom_clien'] ?></p>
            <p class="dt"><span class="fw-bold">Invoicedate</span> : <?= $row['Date_c'] ?></p>
            <table class="table table-striped">
                <thead class="">
                    <tr>
                    
                    <th scope="col">Product</th>
                    <th scope="col">United Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Rising</th>

                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    $req1= "SELECT*FROM vente_order WHERE id=$id";
                    $res1=$conx->query($req1);
                    while($row1=$res1->fetch_assoc()){?>
                    <tr>
                    
                    <td><?= $row1['product'] ?></td>
                    <td><?= $row1['United_Price'] ?></td>
                    <td><?= $row1['Quantity'] ?></td>
                    <td><?= $row1['Rising'] ?></td>

                    </tr>
                   <?php } ?>
                </tbody>
            </table>  
            <p class="Tot"><span class="fw-bold">TotalPrice</span> : <?= $row['price_total'] ?></p>
        </div>
        <div class="buton">
            <Button class="bt" onclick="window.print()">Print</Button>
        </div>
    </div>
    
</body>
</html>