<?php

session_start();

require_once __DIR__."/BASEDATA/DB.php";

$conns = Connecting();

if($_SERVER["REQUEST_METHOD"] == "POST"){

$sql = "UPDATE client_date SET Name = :Name, Address = :Address, Place_and_Date_Birth = :Place_and_Date_Birth, ID_Credits = :ID_Credits WHERE id = :id";

$RES = $conns->prepare($sql);
$RES->bindParam("id", $_POST["id"]);
$RES->bindParam("Name", $_POST["Name"]);
$RES->bindParam("Address", $_POST["Address"]);
$RES->bindParam("Place_and_Date_Birth", $_POST["Place_and_Date_Birth"]);
$RES->bindParam("ID_Credits", $_POST["ID_Credits"]);

$Results = $RES->execute();

if ($Results == true) {
    echo "<script>alert('sukses mengubah');
        location.href='ndex.php'</script>";
}else{
    echo "<script>alert('gagal mengubah');</script>";
}
}


$conns = null;