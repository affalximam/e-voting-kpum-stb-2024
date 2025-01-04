<?php 
session_start();
if(isset($_SESSION["voter"])) {
    session_unset();
    session_destroy();
    header("Location: /");
    exit();
}