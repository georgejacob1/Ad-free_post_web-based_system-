<?php
session_start();
if (!(isset($_SESSION['email']))) {
    echo '<script> alert ("Session expired");</script>';
    echo'<script>window.location.href="../login.php";</script>';
} 
else {
    $username = $_SESSION['email'];
    }

?>