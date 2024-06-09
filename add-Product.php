<?php require "navbar.php"?>

<head>
    
    <style>
       
        
        .a{
            margin-top: 10%;
            display: flex;
            justify-content: center;
            /* margin-left: 37%;
            margin-right: 30%; */
            /* border: 20px;
            border-color:black; */
            

        }
        .b{
          
          align-items: center;
        }

    </style>
</head>
    <div class="col-lg-9"> 
        <div class="container a">
            <div class="card" style="width:70%">
              <div class="card-header bg-dark text-white text-center">
                <h1>Add Product</h1>
              </div>
              <div class="card-body d-flex justify-content-center  b">
                  <form action="controller/add-product.php" method="post" style="width:90%;" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Product Name</label>
                      <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Product Price</label>
                      <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="form-label">Product Quantite</label>
                      <input type="tel" name="qt" class="form-control" id="exampleInputPassword1">
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