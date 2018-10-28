<?php
    require 'session.php';
    require 'db.php';
    require 'dbPDO.php';
$id = 0;
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
if ($_SESSION['isadmin']!=1) {
    if ($id != $_SESSION['analyzerid']) {
            header('Location: report.php?id='.$_SESSION['analyzerid']);
        }
}
$year = 0;
$yearQ = "";
if (isset($_GET['year']) && ($_GET['year'] != -1)) {
    $year = $_GET['year'];
    $yearQ = " and year(date)=". $year;
}
$sql = "SELECT * FROM analyzerreading WHERE analyzerid=".$id.$yearQ;
$result = mysqli_query($conn, $sql);
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ESMS | Users List</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="css/app.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
    <!-- end of page level css -->
</head>

<body class="skin-josh">
        <header class="header">
        <a href="index.php" class="logo">
            <h1>ESMS</h1>
           <!--  <img src="img/logo.png" alt="Logo"> -->
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>


            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/authors/avatar3.jpg" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>
                                    <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="img/authors/avatar3.jpg" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                                <p class="topprofiletext">Admin</p>
                            </li>
                            <!-- Menu Body -->




                            <li>
                                <a href="index.php">
                                    <i class="livicon" data-name="user" data-s="18"> Dashboard</i>
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                               <!--  <a href="adduser.html">
                                    <i class="livicon" data-name="gears" data-s="18"></i> Account Settings
                                </a> -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                              <!--   <div class="pull-left">
                                    <a href="lockscreen.php">
                                        <i class="livicon" data-name="lock" data-s="18"></i> Lock
                                    </a>
                                </div>
 -->                            <div class="pull-right">
                                <p>
                                   <a href="index.php?logout='1'" style="color: red;">logout</a>
                                </p>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="advanced_tables.html">
                                    <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="tasks.html">
                                    <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="gallery.html">
                                    <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="users_list.html">
                                    <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Analyzers</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active" id="active">
                                    <a href="analyzers_list.php">
                                        <i class="fa fa-angle-double-right"></i> View Analyzers
                                    </a>
                                </li>
                                <?php
                                        if ($_SESSION['isadmin']!=0) {
                                            
                                                                   
                                    ?>
                                <li>
                                    <a href="allAnalyzerChart.php">
                                        <i class="fa fa-angle-double-right"></i>
                                            Analyzer Graphs
                                    </a>
                                </li>
                                <li>
                                    <a href="allAnalyzersReport.php">
                                        <i class="fa fa-angle-double-right"></i>
                                            Analyzer Graphs
                                    </a>
                                </li>
                                  
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Users</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                    <li>
                                        <a href="user_create.php">
                                            <i class="fa fa-angle-double-right"></i>
                                                Register User
                                        </a>
                                    </li>

                                    <li>
                                        <a href="users_list.php">
                                            <i class="fa fa-angle-double-right"></i>
                                                Users List
                                        </a>
                                    </li>
                                </ul>
                            
                        </li>
                        <?php
                            }                           
                        ?>



                    </ul>
                </div>
            </section>
        </aside>
        
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Analyzer Report</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="analyzers_list.<?php  ?>">Analyzers List</a>
                    </li>
                    <li class="active">Report</li>
                </ol>
            </section>
                <!--To retrieve list of analyzers-->
    <?php
        //Using PDO method
        $sql = 'SELECT id,name FROM analyzer';
        if ($_SESSION['analyzerid']!=0) {
        $sql .=" WHERE id=". $_SESSION['analyzerid'];
    }
        $statement = $connection->prepare($sql);
        $statement->execute();
        $analyzers = $statement->fetchAll(PDO::FETCH_OBJ);
    ?>
    <?php /*  ?>
    <div class="dropdown" style="align-items: right;">
        <!--Query for selecting year SELECT DISTINCT YEAR(date) FROM `analyzerreading`-->
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" name="analyzerSelect">Analyzer
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php foreach($analyzers as $analyzer): ?>
                <li><a href="form_examples.php?id=<?= $analyzer->id ?>"><?= $analyzer->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php */  ?>
        <div>
            <button>Print Report</button>
        </div>
<section style="border: solid 1px black;">
    <form method="get" action="report.php">
        <div class="form-group" style="width: 200px;">
      <label for="sel1">Select Analyzer :</label>
      <select class="form-control" name="id" id="id">
        <?php foreach($analyzers as $analyzer): ?>
                    <option value="<?= $analyzer->id?>" 
                        <?php if ($analyzer->id == $_GET['id']) {
                            echo "Selected";
                    } ?>><?= $analyzer->name; ?></option>
                <?php endforeach; ?>
        
      </select>
    </div>
        <!--To retrieve distinct years from database-->
        <?php
        /*
            require 'dbPDO.php';
            $sql = "SELECT DISTINCT YEAR(date) FROM `analyzerreading`";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $analyzerYears = $statement->fetchAll(PDO::FETCH_OBJ);
        */
            $sql = "SELECT DISTINCT YEAR(date) AYear FROM `analyzerreading`";
            $result = mysqli_query($conn, $sql);

        ?>
        <div class="form-group" style="width: 200px;">
      <label for="sel1">Select Year</label>
      <select class="form-control" name="year" id="year">
        <option value="-1">All Years</option>
        <?php while($row = mysqli_fetch_assoc($result)){ 
            $AYear = $row['AYear'];?>
                    <option value="<?=$AYear?>"
                     <?php if ($AYear == $year) {
                            echo "Selected";
                    } ?>><?=$AYear?></option>
                <?php } ?>
        
      </select>
    </div>
    <input type="submit" name="submit" value="Submit">
    </form>
</section>
                <br>
                <br>
            
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Analyzer Report
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body"> 
                            <?php
                                //$sqlNameUnit = "SELECT name,analyzerunit FROM analyzer WHERE analyzerid= $id";
                                //$resultNameUnit = mysqli_query($conn, $sqlNameUnit);
                                    //while ( $rowNameUnit = mysqli_fetch_assoc($resultNameUnit)) {
                                //Using PDO Method
                                $sqlNameUnit = "SELECT name,analyzerunit FROM analyzer WHERE id= '$id'";
                                $statementNameUnit = $connection->prepare($sqlNameUnit);
                                $statementNameUnit->execute();
                                $analyzersNameUnit = $statementNameUnit->fetchAll(PDO::FETCH_OBJ);
                                 foreach($analyzersNameUnit as $analyzerNU): 
                    
                        
                                ?>
                                    
                                <h2 style="text-align: center;"><?= $analyzerNU->name; ?> - <?= $analyzerNU->analyzerunit; ?>
                                    
                                </h2>
                            
                                <?php endforeach; ?>
                            
                            <table class="table table-bordered " id="table">
                                <?php
                                //Using PDO Method
                                $sql = "SELECT DISTINCT DATE_FORMAT(date,'%d-%m-%y') as dateOnly,monthnumber,valueunits FROM `analyzerreading` WHERE analyzerid = '$id'";
                                $statement = $connection->prepare($sql);
                                $statement->execute();
                                $analyzerDetails = $statement->fetchAll(PDO::FETCH_OBJ);
                                  
                    
                        
                                ?>
                                <thead>
                                    <tr class="filters">
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Month Number</th>
                                        <th style="text-align: center;">Value Units</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($analyzerDetails as $analyzerD): ?>
                                      <tr>
                                        <td style="text-align: center;"><?= $analyzerD->dateOnly; ?></td>
                                        <td style="text-align: center;"><?= $analyzerD->monthnumber; ?></td>
                                        <td style="text-align: center;"><?= $analyzerD->valueunits; ?></td>
                                  
                                      </tr>
                                    <?php endforeach; ?>                                 
                                </tbody>
                            </table>


                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this user? This operation is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="deleted_users.html" class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').dataTable();
    });
    function printData()
{
   var divToPrint=document.getElementById("table");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
    </script>
    <!-- end of page level js -->
</body>

</html>
