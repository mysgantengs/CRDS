<?php

session_start();
session_destroy();

header("Location: /ndex.php");
exit();