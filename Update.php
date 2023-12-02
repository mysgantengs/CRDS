<?php

session_start();
// session_destroy();

require_once __DIR__."/BASEDATA/DB.php";

// if(isset($_SESSION["Update"]))
// header("Location: /ndex.php");
// exit();

$conns = Connecting();

$id = $_GET["id"];

$sql = "SELECT * FROM client_date WHERE id = '$id'";
$VIEWS = $conns->query($sql);

$ROWS = $VIEWS->fetch(PDO::FETCH_LAZY);



$conns = null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto"><br><br>
                 
                <h1>Update Date Client</h1>
             
        <form action="UpdateII.php" method="post">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?=$ROWS["id"];?>">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name" value="<?=$ROWS["Name"];?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
        <input type="text" class="form-control" name="Address" value="<?=$ROWS["Address"];?>">
        </div>
        <div class="mb-3">
            <label for="Place_and_Date_Birth" class="form-label">Place and Date Birth</label>
        <input type="text" class="form-control" name="Place_and_Date_Birth" value="<?=$ROWS["Place_and_Date_Birth"];?>">
        </div>
        <div class="mb-3">
            <label for="ID_Credits" class="form-label">Id Credits</label>
        <input type="text" class="form-control" name="ID_Credits" value="<?=$ROWS["ID_Credits"];?>">
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
             <input type="submit" class="btn btn-danger" value="Update">
        </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>    
</body>
</html>

