<?php

$_SESSION['currentId'] = "";
session_destroy();
echo "logout";
header("Location: ./");
echo "<script>window.location.href='./';</script>";

?>