<?php
require 'session.php';
require 'create_action.php';
 ?>


<?php require 'header.php'; ?>
<ul>
  <li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="analyzers_list.php">Back </a>
        
      
  </li>
</ul>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add an Analyzer</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      
      <form method="post" action="create_action.php">
      
        <div class="form-group">
          <label for="txtName">Name</label>
          <input type="text" name="txtName" id="txtName" class="form-control">
        </div>
      
        <div class="form-group">
          <label for="txtDescription">Description</label>
          <textarea name="txtDescription" id="txtDescription" class="form-control" rows="5" cols="40"></textarea>
        </div>

        <div class="form-group">
          <label for="txtUnit">Measuring Unit</label>
          <input type="text" name="txtUnit" id="txtUnit" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" href="index.php" class="btn btn-info"  >Add Analyzer</button>
        </div>

      </form>

    </div>
  </div>
</div>
<?php 
    require 'footer.php'; 
?>
