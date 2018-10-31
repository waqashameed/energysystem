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



if (isset($_POST['enableUserBtn'])) {
  $analyzerid = $_POST['analyzer'];
  $isdisabled = 0;

  $sql = "UPDATE users SET analyzerid = '".$analyzerid."', isdisabled = '".$isdisabled."' WHERE id = '".$id."'";
  
  if (mysqli_query($conn, $sql)) {
    $isavailable=0;
  $sqla="UPDATE analyzer SET isavailable=0 WHERE id= '".$analyzerid."'";
    if(mysqli_query($conn, $sqla)){
      header('Location: users_list.php?enableMsg=success'); 
    }
    else {
      header('Location: users_list.php?enableMsg=failure');
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
      <h2>Enable Analyzer</h2>
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
          <input value="<?= $row['username'] ?>" type="text" name="txtUName" id="txtUName" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="txtEmail">Email</label>
          <input type="Email" value="<?= $row['email'] ?>" name="txtEmail" id="txtEmail" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="txtCreationDate">Creation Date</label>
          <input value="<?= $row['creationdate'] ?>" type="text" name="txtCreationDate" id="txtCreationDate" class="form-control" readonly>
        </div>
        <?php
          require 'dbPDO.php';
          $sql = 'SELECT r.id,r.name,u.analyzerid FROM analyzer r LEFT JOIN users u ON u.analyzerid = r.id WHERE r.isavailable=1';
          $statement = $connection->prepare($sql);
          $statement->execute();
          $analyzers = $statement->fetchAll(PDO::FETCH_OBJ);
          if (count($analyzers) == 0) {
            echo $analyzers;
            header('location: users_list.php?errormsg=analyzerNotAvailable');
          }
            
        ?>
        <div>
          <label for="sel1">Select Analyzer :</label>
      <select class="form-control" name="analyzer" id="analyzer">
        <?php foreach($analyzers as $analyzer): 
          
            if(is_null($analyzer->analyzerid))
            {
        ?>
              <option value="<?= $analyzer->id?>">
                <?= $analyzer->name; ?>
                      
              </option>
        <?php
              } 
            endforeach; 
            ?>
        
      </select>
        </div>
        <div class="form-group">
          <button type="submit" onClick="document.location.href='some/page'" name="enableUserBtn" class="btn btn-info" >Enable User </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
