<?php 
$title = "View Records";
require_once "includes/header.php";
require_once "db/conn.php";
require_once "includes/auth_check.php";


$result = $crud->getAttendees();
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Specialty</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php
        while($r = $result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
      <th scope="row"><?php echo $r['attendee_id']   ?></th>
      <th scope="row"><?php echo $r['firstname']  ?></th>
      <th scope="row"><?php  echo $r['lastname'] ?></th>
      <th scope="row"><?php  echo $r['name'] ?></th>
      <th scope="row">
        <a href="view.php?id=<?php echo $r['attendee_id']   ?>" class="btn btn-primary">View</a>
        <a href="edit.php?id=<?php echo $r['attendee_id']   ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are You Sure to DELETE?')" href="delete.php?id=<?php echo $r['attendee_id']   ?>" class="btn btn-danger">Delete</a>
      </th>

    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>




<br><br><br><br><br>
<?php require "includes/footer.php" ?>