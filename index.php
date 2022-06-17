<?php 
$title = "Index";
require_once "includes/header.php";
require_once "db/conn.php";


?>



<h1 class="text-center">Registration for IT Conference</h1>

<form method="post" action="success.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" required class="form-control" id="firstname" name="firstname">
  </div>  
  <div class="form-group">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" required class="form-control" id="lastname" name="lastname">
  </div> 
  <div class="form-group">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob">
  </div>
  <div class="form-group">
    <label for="specialty" class="form-label">Area of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
        <?php
            $result = $crud->index("specialties");
                foreach($result as $row){
                echo '<option value="' . $row["specialty_id"] . '">'. $row["name"] .'</option>';
            }  
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="email" class="form-label">Email address</label>
    <input type="email" required class="form-control" id="email" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="form-group">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone">
    <small id="emailPhone" class="form-text-muted">We'll never share your number  with anyone else.</small>
  </div><br>
  <div class="mb-3">
    <input class="form-control" accept="image/*" type="file" id="avatar" name="avatar">
    <small id="avatar" class="form-text text-muted">File Upload is Optional</small>
</div>
<br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form> 



<br><br><br><br><br>
<?php require "includes/footer.php" ?>