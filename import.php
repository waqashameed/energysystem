<?php 
    require 'session.php';
require 'db.php';
if(isset($_GET["submit"])){
$filename=explode(".", $_FILES['file']['name']);
        if($filename[1]=='csv')
        {
          $handle = fopen($_FILES['file']['tmp_name'], "r");
        }
$row = 1;
//if (($handle = fopen("test.csv", "r")) !== FALSE) {
  $analyzers = array();
  $sqlValues = "";
  $sqlValuesA = "";
  while (($data = fgetcsv($handle, 1000, " ")) !== FALSE) {
    if($row != 1){
      $num = count($data);
      echo "<p> $num fields in line $row: <br /></p>\n";
      print_r($data);
      list($mm,$dd,$yy) = explode("/", $data[0]);
      if(strlen($mm) < 2) $mm = '0'.$mm;
      if(strlen($dd) < 2) $dd = '0'.$dd;
      
      $dateConvert = $yy."-".$mm."-".$dd;
      $sqlValues .= "'".$dateConvert . "'," . $data[3];
      /*for ($c=0; $c < 4; $c++) {
        if($c != 1 && $c != 2){
          
          echo $data[$c] . "<br />\n";
        }
      }*/
      echo "Analyzer Data <br>";
      print_r($analyzerData);
      for ($d=4; $d < $num; $d++) {
         echo $data[$d] . "<br />\n";  
         echo "Value of d : ". ($d-4)."<br>";
         echo $analyzerData[$d-4];

         $sqlSelect = "SELECT * FROM analyzerreading WHERE analyzerid = ".$analyzerData[$d-4]." AND date = '".$dateConvert." 00:00:00' AND monthnumber = ".$data[3]." AND valueunits = ".$data[$d];
         
        echo $sqlSelect;
        $result=mysqli_query($conn,$sqlSelect);
        echo "Result showing";
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) == 0) {
           
         
           $sqlValuesA = $sqlValues .",". $data[$d] . "," . $analyzerData[$d-4];
           echo " Idhar ".$sqlValuesA. " khatam <br>";

           $sqlInsert = "INSERT INTO analyzerreading(date, monthnumber, valueunits, analyzerid) VALUES (".$sqlValuesA.")";

           mysqli_query($conn,$sqlInsert);
           echo " Idhar Insert".$sqlInsert. " khatam <br>";
           $sqlValuesA = "";   
           $sqlInsert = "";
        }
      }  

    }

    else{
      $numHead = count($data);
      for ($c=0; $c < $numHead; $c++) {
        if($c > 3){
          $analyzers[] .= "'".$data[$c]."'"; 
        }
      }
      $analyzersStr = implode(",", $analyzers);
      $sql = "select * from analyzer WHERE name in($analyzersStr)";
      echo $sql;
      $result = mysqli_query($conn, $sql);

      //print_r(mysqli_fetch_assoc($result));
      $i = 1;
      if (mysqli_num_rows($result) > 0) {
        
      // output data of each row
        while($rowData = mysqli_fetch_assoc($result)) {
          $analyzerData[] = $rowData["id"];
           echo "inside " . $i ."<br>";
           $i++;
        }
      }   
      echo "Analyzer Data";
    print_r($analyzerData);
    echo "Analyzer Data end";
    }
    
    $row++;
    $sqlValues = "";
  }
  
  fclose($handle);
//}
  }


/*$id = $_GET['id'];

if(isset($_POST["submit"]))
{
    if($_FILES['file']['name'])
    {
        $filename=explode(".", $_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                              
              $item1=$data[0];
              $item2=$data[1];
                              
              $sql="INSERT into analyzerreading(date,valueunits,analyzerid) values('".$item1."','".$item2."','".$id."') ";
              
              mysqli_query($conn,$sql);

                
            }

            fclose($handle);
            
            header('Location: analyzers_list.php?msg=importDone');



        }
        else{
          //$checkForFileType=1;
            header('Location: analyzers_list.php?msg=wrongFile');
          $messageFileType = "File extension must be of csv or excel.";
            //print($messageFileType);
        }
    }

}*/
    require 'header.php';
 ?>
 <li class="nav-item">
      
        <a  style="width: 69px;" class="nav-link btn btn-primary" href="analyzers_list.php">Back </a>
        
      </li>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Import CSV</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      
      <form method='POST' enctype='multipart/form-data'>
    
        <div align="center" class="well" >
            
                
            
            <p class="btn btn-info">Upload CSV File <input type='file' name='file'/></p>
       
            <p><input style="margin-top: 30px" class="btn btn-primary" type="submit" name="submit" value="import" /></p>
            <?php
                if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'wrongFile'){
            ?>
            <p style="color: red">*** Error: Only CSV file is accepted ***</p>
            <?php
                }
                elseif (isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'importDone') {
                        ?>
                        <p>Import completed successfully!</p>
                        <?php
                    }
            ?>

        </div>


</form>

    </div>
  </div>
</div>
<?php 
    require 'footer.php'; 
?>