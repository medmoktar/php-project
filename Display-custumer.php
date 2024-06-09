<?php require "navbar.php"?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .container{
        margin-top: 7%;
        padding: 0;

      }
      .d-fle{
        padding: 20px;
        width: 300px;
        display: flex;
      }
    </style>
</head>
<body>
    <div class="col-lg-9">
        <div class="container">
              <form class="d-fle" Action="Display-custumer.php" method="post">
                      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                    </form>
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  require "controller/connect.php";
                  if(isset($_POST['submit'])){
                    
                    $search=$_POST['search'];
                    $req="SELECT*FROM clien WHERE nom LIKE '%$search%'";
                    $res=$conx->query($req);
                    if($row=$res->fetch_assoc()){
                      ?>
                      <tr>
                  <td><?=$row['id']?></td>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['tel']?></td>
                    <td>
                    <a class="btn btn-primary" href="edit-custumer.php?id=<?=$row['id']?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" onclick="confirmdelet(<?= $row['id'] ?>)"><i class="bi bi-trash3-fill"></i></a>
                  </td>
                  </tr>
                  <?php }}else{
                  $star= 0; 
                  $end=6; 
                  $r=$conx->query("SELECT*FROM clien ");
                  $nb = $r->num_rows;
                  $page=ceil($nb/$end);
                  if(isset($_GET["page-nr"])){
                    $pages=$_GET["page-nr"]-1;
                    $star=$end*$pages;
                  }
                  $req="SELECT*FROM clien LIMIT $star,$end";
                  $res=$conx->query($req);
                  while($row=$res->fetch_assoc()){
                  ?>
                  <tr>
                  <td><?=$row['id']?></td>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['tel']?></td>
                    <td>
                    <a class="btn btn-primary" href="edit-custumer.php?id=<?=$row['id']?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" onclick="confirmdelet(<?= $row['id'] ?>)"><i class="bi bi-trash3-fill"></i></a>
                  </td>
                  </tr>
                  
                  <?php }} ?>
                </tbody>
              </table>
        </div>
  
<nav aria-label="Page navigation example " style="padding:0%; margin-top:0%;">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmdelet(id){
    Swal.fire({
      title:"Êtes-vous sûr?",
      text:"Vous ne pourrez pas annuler cela!",
      icon:"warning",
      showCancelButton:true,
      cancelButtonText:"Non",
      cancelButtonColor:"#d33",
      confirmButtonText:" Oui!",
      confirmButtonColor:"#0D6EFD"
    }).then((result)=>{
      if(result.isConfirmed){
        window.location.href=`controller/delete-custumer.php?id=${id}`
      }
    })
  }
</script>
    
</body>
</html>