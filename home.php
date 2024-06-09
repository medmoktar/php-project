<?php require "navbar.php"?>

<head>
<link href="css/style.css" rel="stylesheet">
    <style>
        .b{
            text-decoration: none;
        }    
        .a{
            /* display: flex;*/
            margin-top: 10%;
            
        }

        /* .col-sm-6{
            padding: 50px;
            margin-left: 20px;
            /* width: 50px; */
        }
        #a{
            margin-left: 50px;
        } */
        .mr-3{
            margin-top: 0;
        }
        /* .mr-3:hover{
            transform: scale(1.2);
        } */
        .media{
            margin-top: 20px;
        }
        /* .media:hover{
            transform: scale(1.2);
        } */

        .col-sm-4{
            text-decoration: none;
            /* width: 1%; */
        }

        .col-sm-4:hover{
            transform: scale(1.2); 
        }
        .c{
            width: 100%;
        }
        
    </style>
</head>
    <div class="col-lg-9">
        <div class="container a">
            <div class="row">
                <div class="col-lg-4  col-md-2 col-xl-4 col-xxl-4 col-sm-4 ">
                    <a href="Display-custumer.php" class="b">
                        <div class="widget-stat card bg-primary c">
                            <div class="card-body">
                                <div class="media" >
                                    <span class="mr-3" >
                                    <i class="bi bi-people-fill"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total Custumer</p>
                                        <?php
                                            include('controller/connect.php');
                                            $req="SELECT COUNT(*) AS nb_clien FROM clien";
                                            $res=mysqli_query($conx,$req);
                                            if($row=mysqli_fetch_assoc($res)){
                                            $nb=$row['nb_clien'];
                                            echo"<h3 class='text-white'>$nb</h3>";
                                            }
                                        ?>
                                                    
                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>    
                </div>
                <div class="col-lg-4  col-md-4 col-xl-4 col-xxl-4 col-sm-4" id="a" ">
                    <a href="Display-Product.php" class="b">
                        <div class="widget-stat card bg-warning c">
                            <div class="card-body">
                                <div class="media" >
                                    <span class="mr-3">
                                    <i class="bi bi-basket3-fill"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total Product</p>
                                        <?php
                                            include('controller/connect.php');
                                            $req="SELECT COUNT(*) AS nb_product FROM product";
                                            $res=mysqli_query($conx,$req);
                                            if($row=mysqli_fetch_assoc($res)){
                                            $nb=$row['nb_product'];
                                            echo"<h3 class='text-white'>$nb</h3>";
                                            }
                                        ?>
                                                    
                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>    
                </div>
                <div class="col-lg-4  col-md-4 col-xl-4 col-xxl-4 col-sm-4" ">
                    <a href="Display-Invoice.php" >
                        <div class="widget-stat card bg-secondary c">
                            <div class="card-body">
                                <div class="media">
                                    <span class="mr-3">
                                    <i class="bi bi-cart-fill"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Total invoice</p>
                                        <?php
                                            include('controller/connect.php');
                                            $req="SELECT COUNT(*) AS nb_invoice FROM facture";
                                            $res=mysqli_query($conx,$req);
                                            if($row=mysqli_fetch_row($res)){
                                            $nb=$row[0];
                                            echo"<h3 class='text-white'>$nb</h3>";
                                            }
                                            ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>   
                </div>
            </div>
        </div>
    </div>
</div>                            
</body>
</html>