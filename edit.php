<?php 
$title = "Edit";
require_once "includes/header.php";
require_once "includes/auth_check.php";
require_once "db/conn.php";

if(!isset($_GET["id"])){
    include "includes/error.php";
} else{
    $id = $_GET["id"];
    $attendee = $crud->getAttendeeDetails($id);
    if($attendee != null){
?>

<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php  echo $id ?>">
    <div class="form-group">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>"  id="firstname" name="firstname">
    </div>  
    <div class="form-group">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
    </div> 
    <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
    </div>
    <div class="form-group">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <?php
            $result = $crud->index("specialties");
            foreach($result as $row){
             ?>       
            <option value="<?php echo  $row["specialty_id"] ?>"
                <?php  
                    if($row["specialty_id"] == $attendee["specialty_id"]) 
                        echo "selected" ;       
                    echo ">" . $row["name"];  
                    
                ?>
            </option>
            <?php
            }  
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone">
        <div id="emailPhone" class="form-text">We'll never share your number  with anyone else.</div>
    </div>
    <button type="submit" name="submit" class="btn btn-success">Save</button>
</form>

<?php
    }else {
        include "includes/error.php"; 
    }
}

?>

<br><br><br><br><br>
<?php require "includes/footer.php" ?>