<?php

session_start();
// session_destroy();

require_once __DIR__."/BASEDATA/DB.php";

if(isset($_SESSION["Add"])){
    header("Location: /ndex.php");
    exit();
}


$conns = Connecting();

    $errs = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $SQL = "INSERT INTO client_date(Name, Address, Place_and_Date_Birth, ID_Credits) VALUES(:Name, :Address, :Place_and_Date_Birth, :ID_Credits)";
        $Views = $conns->prepare($SQL);

        $Params = [
            "Name" => $_POST["Name"],
            "Address" => $_POST["Address"],
            "Place_and_Date_Birth" => $_POST["Place_and_Date_Birth"],
            "ID_Credits" => $_POST["ID_Credits"]
        ];

        // // if(!empty("ID_Credits") == ""){
        // //     header("Location: /Add.php");
        // //     exit();
        // }

        $vie = $Views->execute($Params);

        

        if($vie == true){
            $_SESSION["Add"] = true;
            header("Location: /ndex.php");
            exit();
        }else{
            echo "<script>alert('gagal menambahkan');</script>";
        } 
    }

   

 $conns = null;
    


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="cs.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto"><br><br>
                 
                <h3>Add Date Client</h3>

                <?php if($errs !== ""){ ?>
                    <?php echo "<script>alert('gagal menambahkan');</script>";?>
                <?php }?>

             
        <form action="" method="post">
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
        <input type="text" class="form-control" name="Address">
        </div>
        <div class="mb-3">
            <label for="Place_and_Date_Birth" class="form-label">Place and Date Birth</label>
        <input type="text" class="form-control" name="Place_and_Date_Birth">
        </div>
        <div class="mb-3">
            <label for="ID_Credits" class="form-label">Id Credits</label>
        <input type="text" class="form-control" name="ID_Credits" autocomplete="off">
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
             <input type="submit" class="btn btn-danger" value="Add">
        </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>    
</body>
</html>