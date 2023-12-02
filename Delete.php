<?php

require_once __DIR__."/BASEDATA/DB.php";

$conns = Connecting();

$ID = $_GET["id"];

$sql = "DELETE FROM client_date WHERE id = '$ID'";
$Del = $conns->exec($sql);

if($Del == true){
    // header("Location: /ndex.php");
    echo "<script>alert('berhasil menghapus');
        location.href='ndex.php'</script>";
    // exit();
}else{
    echo "<script>alert('gagal menghapus');</script>";
}

