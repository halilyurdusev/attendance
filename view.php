<?php 
$title = "View Record";
require_once "includes/header.php";
require_once "db/conn.php";
if(!isset($_GET["id"] )){
    include "includes/error.php";
}else {
         $id = $_GET["id"];
    $result = $crud->getAttendeeDetails($id);
    if($result != null){
    
   
    
    
    
    ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php  echo $result["firstname"] . " " . $result["lastname"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result["name"]; ?></h6>
                <p class="card-text">E-mail: <?php echo $result["email"]; ?></p>
                <p class="card-text">Date of Birth: <?php echo $result["dateofbirth"]; ?></p>
                <p class="card-text">Phone: <?php echo $result["contactnumber"]; ?></p>
            </div>
        </div>
        <br>
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attendee_id']   ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are You Sure to DELETE?')" href="delete.php?id=<?php echo $result['attendee_id']   ?>" class="btn btn-danger">Delete</a>

    <?php 
    } else {
        include "includes/error.php";
    }

}

?>












<br><br><br><br><br>
<?php require "includes/footer.php" ?>