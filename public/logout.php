<?php
session_start();
unset($_SESSION["userid"]);
session_destroy();
echo json_encode(["success"=>"ok"]);
?>