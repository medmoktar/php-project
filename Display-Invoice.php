<?php require "navbar.php"?>

<head>
    
    <style>
        .c{
            margin-top: 10%
        }

        .tb{
            padding:10px ;
        }
        .text{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
    <div class="col-lg-9">
        <div class="container c">
            <div class="card  marge10 form-disable">
                <table class="table table-striped tb">
                        <thead class="table-dark">
                            <tr>
                            
                            <th scope="col">Custumer Name</th>
                            <th scope="col">Date Commend</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>

                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php require "controller/connect.php";
                            $req= "SELECT*FROM facture";
                            $res=$conx->query($req);
                            while($row=$res->fetch_assoc()){
                            ?>
                            <tr>
                            
                            <td><?= $row['nom_clien'] ?></td>
                            <td><?= $row['Date_c'] ?></td>
                            <td><?= $row['price_total'] ?></td>
                            <td><button type="button" class="btn btn-success"><a class="text" href="controller/vente.php?id=<?= $row['id'] ?>">sold</a></button></td>
                            </tr>
                            <tr>
                            <?php }?>
                            
                        </tbody>
                </table>
            </div>    
        </div> 
    </div>
</div>        
</body>
</html>