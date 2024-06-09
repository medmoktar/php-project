<?php require "navbar.php"?>

<?php 
    require "controller/connect.php";
    $id=$_GET['id'];
    $req="SELECT*FROM product WHERE id=$id";
    $res=$conx->query($req);
    $row=$res->fetch_assoc();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a{
            margin-top: 10%;
            display: flex;
            justify-content: center;
            
            

        }
        .b{
          
          align-items: center;
        }


    </style>
</head>
<body>
<div class="col-lg-9"> 
        <div class="container a">
            <div class="card" style="width:70%">
              <div class="card-header bg-dark text-white text-center">
                <h1>Edit Product</h1>
              </div>
              <div class="card-body d-flex justify-content-center  b">
               
                  <form action="controller/update-product.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label  class="form-label">Product Name</label>
                      <input type="text" name="nom" class="form-control"  value="<?=$row['nom']?>">
  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Product Price</label>
                      <input type="text" name="price" class="form-control"  value="<?=$row['price']?>">
                    </div>  
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="form-label">Add Quantity</label>
                      <input type="tel" name="qt" class="form-control"  value="">
                    </div>

                    
                    <div class="form-group fallback w-100 my-3">
                      <input type="file" name='im' class="dropify" data-default-file="">
                    </div>

                    <div class="d-grid gap-2">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  </div>    
            </div>  
        </div>  
    </div>
</div>     
    
</body>
</html>