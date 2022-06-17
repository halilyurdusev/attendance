<?php 
require_once "db/conn.php";
require_once "includes/auth_check.php";

if(!isset($_GET["id"])){
    include "includes/error.php";
} else{
    $id = $_GET["id"];
    $result = $crud->deleteAttendee($id);
    if($result){
        header("Location: viewrecords.php");
    } else {
        include "includes/error.php";
    }
}
?>