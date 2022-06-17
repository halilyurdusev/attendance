<?php 
$title = "Success";
require "includes/header.php"; 
require_once "db/conn.php";



if(isset($_POST["submit"])){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact = $_POST["phone"];
    $specialty = $_POST["specialty"];

    $orig_file = $_FILES['avatar']['tmp_name'];
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $target_dir = "uploads/";
    $destination = $target_dir . $contact . "." . $ext;
    move_uploaded_file($orig_file, $destination);

    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty, $destination);

    if($isSuccess){
        include "includes/successmessage.php";
        require_once "sendemail.php";
    } else {
        include "includes/error.php";
    }
}
?>


<img src="<?php echo empty($destination) ? 'uploads/default.jpg' : $destination ?>" style="width: 20%; height: 20%">

<div class="card" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title"><?php  echo $_POST["firstname"] . " " . $_POST["lastname"]; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST["specialty"]; ?></h6>
    <p class="card-text">E-mail: <?php echo $_POST["email"]; ?></p>
    <p class="card-text">Phone: <?php echo $_POST["phone"]; ?></p>
  </div>
</div>




<br><br><br><br><br>
<?php require "includes/footer.php" ?>