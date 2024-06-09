<?php require "navbar.php"?>

<head>
    
    <style>
        /* .form-control {
            width: 100%;
            
        } */

        .a{
            margin-top: 13%;
            display: flex;
            justify-content: center;
            /* margin-left: 37%;
            margin-right: 30%;
            border: 20px;
            border-color:black; */
            

        }
        .f{
          width: 90%;
        }

    </style>
</head>
    <div class="col-lg-9">
        <div class="container a">
          <div class="card w-70" style="width:70%; "> 
            <div class="card-header bg-dark text-white text-center ">
              <h1>Add Custumer</h1>
            </div>
            <div class="card-body " style="display:flex; justify-content:center;">
                <form action="controller/add-custumer.php" class="f" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>  
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Phone number</label>
                    <input type="tel" name="tel" class="form-control" id="exampleInputPassword1">
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