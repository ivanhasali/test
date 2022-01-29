<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
	header("Location: ../config/error.php");
    die("Anda belum login");//

}

//cek level user
if($_SESSION['level'] != "ADMIN")
{
	header("Location: ../index.php");
}
?>