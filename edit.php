<?php
//require 'edit_action.php';

require 'session.php';
require 'db.php';
$id = $_GET['id'];
if ($_SESSION['isadmin']!=1) {
    if ($id != $_SESSION['analyzerid']) {
            header('Location: edit.php?id='.$_SESSION['analyzerid']);
        }
  }
$sql = "SELECT * FROM analyzer WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);



if (isset($_POST['txtName']) && isset($_POST['txtDescription']) ) {
  $analyzerName = $_POST['txtName'];
  $analyzerDescription = $_POST['txtDescription'];
  $analyzerunit = $_POST['txtUnit'];

  $sql = "UPDATE analyzer SET name = '".$analyzerName."', description = '".$analyzerDescription."', analyzerunit = '".$analyzerunit."' WHERE id = '".$id."'";
  
  if (mysqli_query($conn, $sql)) {
  header('Location: analyzers_list.php?editMsg=success');
  } 
  else {
    header('Location: analyzers_list.php?editMsg=failure');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}
 ?>
<?php require 'header.php'; ?>
<li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="analyzers_list.php">Back </a>
        
      </li>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Edit Analyzer</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>


      <form method="post">
        <div class="form-group">
          <label for="txtName">Name</label>
          <input value="<?= $row['name'] ?>" type="text" name="txtName" id="txtName" class="form-control">
        </div>
        <div class="form-group">
          <label for="txtDescription">Description</label>
          <input type="text" value="<?= $row['description'] ?>" name="txtDescription" id="txtDescription" class="form-control">
        </div>
        <div class="form-group">
          <label for="txtUnit">Measuring Unit</label>
          <input value="<?= $row['analyzerunit'] ?>" type="text" name="txtUnit" id="txtUnit" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" onClick="document.location.href='some/page'" class="btn btn-info" >Update Analyzer </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
