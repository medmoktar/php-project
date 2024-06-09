<?php require "navbar.php"?>
<?php
require "controller/connect.php";
$id=$_GET['id'];
$req="SELECT*FROM clien WHERE id=$id";
    $res=$conx->query($req);
    // $res=$conx->prepare($req);
    // $res->bind_param('i',$id);
    // $res->execute();
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
            margin-top: 13%;
            display: flex;
            justify-content: center;

          
        }
        .f{
          width: 90%;
        }

    </style>
</head>
<body>
<div class="col-lg-9">
        <div class="container a">
          <div class="card w-70" style="width:70%; "> 
            <div class="card-header bg-dark text-white text-center ">
              <h1>Add Custumer</h1>
            </div>
            <div class="card-body " style="display:flex; justify-content:center;"> 
                <form action="controller/update-custumer.php?id=<?= $id ?>" class="f" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['nom']?>">
                    </div>
              
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['prenom']?>">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Phone number</label>
                    <input type="tel" name="tel" class="form-control" id="exampleInputPassword1" value="<?=$row['tel']?>">
                  </div>
                  
                  <div class="d-grid gap-2 my-3">
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
