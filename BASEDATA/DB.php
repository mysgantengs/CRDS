<?php

require_once __DIR__."/../Const/const.php";

function Connecting(){

    $DB_host = DB_Host;
    $DB_port = DB_Port;
    $DB_name = DB_Name;
    $DB_nameuser = DB_Username;
    $DB_password = DB_Password;

    return new PDO("mysql:port=$DB_host:$DB_port;dbname=$DB_name", $DB_nameuser, $DB_password);

}














// try {
//     Connecting();
//     echo "ok";
// } catch (Exception $e) {
//     echo "errors : ".$e->getmessage();
// }