<?php
//require 'edit_action.php';

require 'session.php';
require 'db.php';
$id = 0;
$id = $_GET['id'];
if ($_SESSION['isadmin']!=1) {
    if ($id != $_SESSION['analyzerid']) {
            header('Location: edit.php?id='.$_SESSION['analyzerid']);
        }
  }
$sql = "SELECT * FROM users WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);



if (isset($_POST['editUserBtn'])) {
  $un = $_POST['txtUName'];
  $email = $_POST['txtEmail'];

  $sql = "UPDATE users SET username = '".$un."', email = '".$email."' WHERE id = '".$id."'";
  
  if (mysqli_query($conn, $sql)) {
  header('Location: users_list.php?enableMsg=success');
  } 
  else {
    header('Location: users_list.php?enableMsg=failure');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}
 ?>
<?php require 'header.php'; ?>
<li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="users_list.php">Back </a>
        
      </li>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Edit User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>


      <form method="post">
        <div class="form-group">
          <label for="txtUName">User Name</label>
          <input value="<?= $row['username'] ?>" type="text" name="txtUName" id="txtUName" class="form-control" >
        </div>
        <div class="form-group">
          <label for="txtEmail">Email</label>
          <input type="Email" value="<?= $row['email'] ?>" name="txtEmail" id="txtEmail" class="form-control" >
        </div>
        <div class="form-group">
          <label for="txtCreationDate">Creation Date</label>
          <input value="<?= $row['creationdate'] ?>" type="text" name="txtCreationDate" id="txtCreationDate" class="form-control" readonly>
        </div>
        
        <div class="form-group">
          <button type="submit" onClick="document.location.href='some/page'" name="editUserBtn" class="btn btn-info" >Update User </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
