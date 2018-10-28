<?php
/*
require 'session.php';
require 'db.php';
if(isset($_POST["submit"]))
{
    $sql="truncate table tbl_excel";
    mysqli_query($connect,$sql);
}

if(isset($_POST["submit"]))
{
    if($_FILES['file']['name'])
    {
        $filename=explode(".", $_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $handle = fopen($_FILES['file']['tmp_name'], "r");

            while ($data = fgetcsv($handle)) {

                $item1=mysqli_real_escape_string($connect,$data[0]);
                $item2=mysqli_real_escape_string($connect,$data[1]);
              
                
                    $sql="INSERT into analyzerreading(date,valueunits) values('".$item1."','".$item2."') ";
                    mysqli_query($connect,$sql);

                
            }

            fclose($handle);
            header('Location: form_builder.php?msg=importDone');



        }
        else{
        	//$checkForFileType=1;
            header('Location: form_builder.php?msg=wrongFile');
        	$messageFileType = "File extension must be of csv or excel.";
            //print($messageFileType);
        }
    }

}
*/
?>