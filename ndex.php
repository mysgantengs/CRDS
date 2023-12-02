<?php

session_start();

require_once __DIR__."/BASEDATA/DB.php";

if(!isset($_SESSION["Add"])){
    header("Location: /Add.php");
    exit();
}

// if(!isset($_SESSION["Update"])){
//     header("Location: /Update.php");
//     exit();


$Date = Connecting();

$QRY = "SELECT * FROM client_date";
$RES = $Date->query($QRY);


// foreach($RES as $show){
//     var_dump($show);
// }

$Date = null;



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
        
            <div class="col-md-9 mx-auto">
        <h1 class="text-center">Bank Client</h1><br>


        <a href="Adds.php" class="badge bg-success float-right">Add</a><br><br>
       
   
<table class="table table-striped">
<tr>
    <th>No</th>
    <th>Actions</th>
    <th>Name</th>
    <th>Address</th>
    <th>Place And Date Birth</th>
    <th>Id Credits</th>
</tr>

<?php foreach ($RES as $ROW){?>
<tr>
    <td><?=$ROW["id"];?></td>
    <td><a href="Update.php?id=<?=$ROW['id'];?>" class="badge bg-primary float-right">Update</a> <a href="Delete.php?id=<?=$ROW['id'];?>" class="badge bg-danger float-right">Delete</a>
    <td><?=$ROW["Name"];?></td>
    <td><?=$ROW["Address"];?></td>
    <td><?=$ROW["Place_and_Date_Birth"];?></td>
    <td><?=$ROW["ID_Credits"]?></td>
</tr>
<?php }?>
</table>
</div>
       
        </div> 
    </div>
    
    
    
   

    <script src="js/bootstrap.min.js"></script>    
</body>
</html>