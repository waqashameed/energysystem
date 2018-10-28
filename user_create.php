<?php
require 'server.php';
if ($_SESSION['isadmin']!=1) {
        header('Location: analyzers_list.php');
    }
 


 require 'header.php';
  ?>
<li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="users_list.php">Back</a>
        
      </li>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add a User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      
      <form method="post">
        <?php include('errors.php'); ?>
        <div class="form-group">
          <label for="username">Name</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="password_1">Password</label>
          <input type="password" name="password_1" id="password_1" class="form-control">
        </div>

        <div class="form-group">
          <label for="password_2">Confirm password</label>
          <input type="password" name="password_2" id="password_2" class="form-control">
        </div>
        <?php
          require 'dbPDO.php';
          $sql = 'SELECT r.id,r.name,u.analyzerid FROM analyzer r LEFT JOIN users u ON u.analyzerid = r.id';
          $statement = $connection->prepare($sql);
          $statement->execute();
          $analyzers = $statement->fetchAll(PDO::FETCH_OBJ);
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
          <button type="submit" class="btn btn-info" name="reg_user" >Create User</button>
        </div>

      </form>

    </div>
  </div>
</div>
<?php 
    require 'footer.php'; 
?>