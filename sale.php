<?php require "navbar.php"?>

<head>
    
    <style>
        .c{
            margin-top: 15%
        }

        .tb{
            padding:10px ;
            text-align: center;
            
           
        }
        .text{
            text-decoration: none;
            color: white;
        }
        .k{
            margin-top:10% ;
        }
        
        
    </style>
</head>
        <div class="col-lg-9">
            <div ss="container c">
                <div class="card  marge10 form-disable a" style="margin-top:10% ;margin-right:5%">
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
                                $start=0;
                                $end=6;
                                $req=$conx->query("SELECT*FROM vente");
                                $nb=$req->num_rows;
                                $page=ceil($nb/$end);
                                if(isset($_GET["page-nr"])){
                                    $pages=$_GET["page-nr"]-1;
                                    $start=$end*$pages;
                                }
                                $req= "SELECT*FROM vente LIMIT $start,$end";
                                $res=$conx->query($req);
                                while($row=$res->fetch_assoc()){
                                ?>
                                <tr>
                                
                                <td><?= $row['nom_clien'] ?></td>
                                <td><?= $row['Date_c'] ?></td>
                                <td><?= $row['price_total'] ?></td>
                                <td><button type="button" class="btn btn-success"><a class="text" href="invoice.php?id=<?= $row['id'] ?>">Invoice</a></button></td>
                                </tr>
                                <tr>
                                <?php }?>
                                
                            </tbody>
                    </table>
                </div>    
            </div>   
            <nav aria-label="Page navigation example k">
                <ul class="pagination ">
                <?php if(isset($_GET["page-nr"]) && $_GET["page-nr"]>1){
                    ?>
                    <li class="page-item"><a class="page-link" href="?page-nr=<?= $_GET["page-nr"]-1 ?>">Previous</a></li>
                <?php
                    }else{
                    ?>
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>  
                <?php }  
                ?>   
                    <?php 
                    for($i=1;$i<=$page;$i++){?>
                    <li class="page-item"><a class="page-link" href="?page-nr=<?= $i ?>"><?= $i ?></a></li>
                    <?php }
                    ?>
                    
                    <?php if(!isset($_GET["page-nr"])){
                    ?>
                    <li class="page-item"><a class="page-link" href="?page-nr=2">Next</a></li>
                <?php
                    }else{
                    if($_GET["page-nr"]>=$page){
                    ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>  
                    <?php }else{ 
                    ?> 
                    <li class="page-item"><a class="page-link" href="?page-nr=<?= $_GET["page-nr"] + 1 ?>">Next</a></li>
                <?php }}  
                ?>   
                    
                </ul>
            </nav>
        </div>
</div>            
</body>
</html>