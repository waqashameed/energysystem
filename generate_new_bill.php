<?php
require 'server.php';
if ($_SESSION['isadmin']!=1) {
        header('Location: analyzers_list.php');
    }
 
if (isset($_POST['btnGenBill'])) {
  $txtDateFrom = $_POST['txtDateFrom'];
  $txtDateto = $_POST['txtDateto']; 
  $txtDueDate = $_POST['txtDueDate']; 
  $txtNote = $_POST['txtNote']; 

  echo "Date From : ". $txtDateFrom;
  echo "<br>Date To : ". $txtDateFrom;
  echo "<br>Date Due : ". $txtDateFrom;
  echo "<br>Note : ". $txtDateFrom;
}













 require 'header.php';
  ?>
<li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="generate_bill.php">Back</a>
        
      </li>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Generate New Bill</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      
      <form method="post">
        <div class="form-group">
          <label for="txtDateFrom">Select Date From</label>
          <input type="Date" name="txtDateFrom" id="txtDateFrom" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="txtDateto">Select Date to</label>
          <input type="Date" name="txtDateto" id="txtDateto" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="txtDueDate">Select Due Date</label>
          <input type="Date" name="txtDueDate" id="txtDueDate" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="txtNote">Note (if any)</label>
          <input type="text" name="txtNote" id="txtNote" class="form-control" required>
        </div>
        

        <div class="form-group">
          <button type="submit" class="btn btn-info" name="btnGenBill" >Generate Bill</button>
        </div>

      </form>

    </div>
  </div>
</div>
<?php 
    require 'footer.php'; 
?>