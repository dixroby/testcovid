<?php
session_start();
session_destroy();
header('Location: ../../pas/index.php');
?>