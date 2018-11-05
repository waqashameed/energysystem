<?php
require 'server.php';
require_once 'db.php';
if ($_SESSION['isadmin']!=1) {
        header('Location: analyzers_list.php');
    }
 
if (isset($_POST['btnGenBill'])) {
  list($y,$m) = explode('-', $_POST['txtDate']);
  $dueDate=Date('y-m-d', strtotime("+10 days"));
  $units=0;
  $amount=0;
  $rate=13;
  $txtNote = $_POST['txtNote']; 

  $sqlB = "SELECT * FROM `analyzerreading` WHERE monthnumber=".intval($m)." AND year(date)=".intval($y)." AND billgenerated=0";
  $resultB = mysqli_query($conn, $sqlB);

  while($rowB = mysqli_fetch_assoc($resultB)){
    if (intval($m)==1) {
      $prevMonth=12;
      $prevYear=intval($y)-1;
    }
    else{
      $prevMonth=intval($m)-1;
      $prevYear=intval($y);
    }

    $sqlPM = "SELECT valueunits FROM analyzerreading WHERE monthnumber=".$prevMonth." AND year(date)=".$prevYear." AND analyzerid=".$rowB['analyzerid']; 
    $resultPM = mysqli_query($conn, $sqlPM);
    $prevMonthUnits = 0;
    while($rowPM = mysqli_fetch_assoc($resultPM)){
      $prevMonthUnits = $rowPM['valueunits'];
    }
    $units=$rowB['valueunits']-$prevMonthUnits;
    $amount= $units*$rate;
    $query = "INSERT INTO bill (month, year, duedate, prevmonthunits, currentmonthunits, units, amount, note, analyzerid, issuedate) VALUES(".intval($m).", ".intval($y).", '".$dueDate."', ".$prevMonthUnits.", ".$rowB['valueunits'].", ".$units.", ".$amount.", '".$txtNote."',".$rowB['analyzerid'].", now())";

    mysqli_query($db, $query);
    //Bill generated
    $sqlBG = "UPDATE analyzerreading SET billgenerated=1 WHERE excel_id=".$rowB['excel_id'];
    mysqli_query($db, $sqlBG);
  }
     // header('location: generate_bill.php');
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
          <label for="txtDate">Select Month</label>
          <select class="form-control" name="txtDate" id="txtDate" required>
            <?php
              $sqlD="SELECT DISTINCT date FROM analyzerreading WHERE billgenerated=0";
              echo $sqlD;
              $resultD = mysqli_query($conn, $sqlD);
              while($rowD = mysqli_fetch_assoc($resultD)){
                $date = new DateTime($rowD['date']);
                //$date->modify('-1 month');
                $date->sub(new DateInterval('P1M'));
                //echo $date->format('d-m-Y')
                //$formattedDate = Date($rowD['date'], strtotime("+1 days"));
            ?>
            <option value="<?=$date->format('Y-m')?>"><?=$date->format('m-Y')?></option>
            <?php
              }
            ?>
            </select>
        </div>

        <div class="form-group">
          <label for="txtNote">Note (if any)</label>
          <input type="text" name="txtNote" id="txtNote" class="form-control">
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