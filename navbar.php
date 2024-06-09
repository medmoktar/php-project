<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark nv" >
  <div class="container-fluid">
  <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  <span class="navbar-toggler-icon"></span>
</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <form class="d-flex fl">
        <button class="bt" onclick="confirmLogout(event)"><i class="bi bi-box-arrow-right"></i>Logout</button>
      </form>
    </div>
  </div>
</nav>


<div class="row">
      <div class="col-lg-3">  
            <div class="offcanvas offcanvas-start bg-dark text-white bar "  tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" >
              
              <div class="offcanvas-body">
                <nav class="navbar-dark">
                  <ul class="navbar-nav">
                    <li>
                      <div class="text-muted small">core</div>
                    </li>
                    <li>
                      <a href="home.php" class="nav-link px-3 active">
                        <span class="me-1"><i class="bi bi-house-door-fill"></i></span>
                        <span>Dashboard</span>
                      </a>
                    </li>
                    <li class="my-4">
                      <hr class="dropdown-divider"/>
                    </li>
                    <li>
                      <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-1"><i class="bi bi-people-fill"></i></span>
                        <span class="">Custumer</span>
                        <span class="cs" ><i class="bi bi-chevron-down"></i></span>
                      </a>
                      
                      <div class="collapse" id="collapseExample">
                          <div>
                              <ul class="navbar-nav ps-3">
                                <li>
                                  <a href="add-custumer.php" class="nav-link">
                                    <span><i class="bi bi-person-fill-add"></i></span>
                                    <span>Add Custumer</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="Display-custumer.php" class="nav-link">
                                    <span><i class="bi bi-people-fill"></i></span>
                                    <span>Display-custumer</span>
                                  </a>
                                </li>
                              </ul>
                          </div>
                      </div>    
                    </li>
                    <li>
                      <a href="#cp" data-bs-toggle="collapse" class="nav-link mx-3">
                        <span><i class="bi bi-basket3-fill"></i></span>
                        <span class="mx-1">Product</span>
                        <span class="cp"><i class="bi bi-chevron-down"></i></span>
                      </a>
                      <div class="collapse" id="cp">
                          <ul class="navbar-nav mx-3">
                              <li>
                                <a href="add-Product.php" class="nav-link">
                                  <span class=""><i class="bi bi-bag-plus-fill"></i></span>
                                  <span>Add-product</span>
                                </a>
                              </li>
                              <li>
                                <a href="Display-Product.php" class="nav-link">
                                  <span><i class="bi bi-basket3-fill"></i></span>
                                  <span>Display-Product</span>
                                </a>
                              </li>
                          </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#co" class="nav-link mx-3" data-bs-toggle="collapse">
                        <span><i class="bi bi-cart-fill"></i></span>
                        <span class="mx-1">Order</span>
                        <span class="co"><i class="bi bi-chevron-down"></i></span>
                      </a>
                      <div class="collapse" id="co">
                        <ul class="navbar-nav mx-3">
                          <li>
                            <a href="add-Invoice.php" class="nav-link">
                              <span><i class="bi bi-cart-plus-fill"></i></span>
                              <span>Add-Order</span>
                            </a>
                          </li>
                          <li>
                            <a href="Display-Invoice.php" class="nav-link">
                            <span><i class="bi bi-cart-fill"></i></span>
                            <span>Display-Order</span>
                            </a>
                          </li>
                          <li>
                            <a href="sale.php" class="nav-link">
                              <span></span>
                              <span>Order Sale</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    
                  </ul>
                </nav>
                
              </div>
            </div>
      </div>
     
        <!-- <button class="bt" onclick="confirmLogout(event)"><i class="bi bi-box-arrow-right"></i>Logout</button> -->
      
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmLogout(){
    event.preventDefault();
    Swal.fire({
      title:"Logout",
      text:"Are you sure you want to log out?",
      icon:"warning",
      showCancelButton:true,
      cancelButtonText:"Non",
      cancelButtonColor:"#d33",
      confirmButtonText:"Oui!",
      confirmButtonColor:"#0D6EFD"
    }).then((result)=>{
      if(result.isConfirmed){
        window.location.href="controller/logout.php";
      }
    })
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
