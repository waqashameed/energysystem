<?php
    require 'session.php';
    require 'db.php';
    require 'dbPDO.php';
?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <title>ESMS | Analyzers Report</title>
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
                                <li>
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
                                            Analyzers Graphs
                                    </a>
                                </li>
                                <li  class="active" id="active">
                                    <a href="allAnalyzersReport.php">
                                        <i class="fa fa-angle-double-right"></i>
                                            Analyzers Report
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
                        <a href="analyzers_list.<?php  ?>">Analyzers</a>
                    </li>
                    <li class="active">Analyzer Report</li>
                </ol>
            </section>
                <!--To retrieve list of analyzers-->
                <div>
                    <button>Print Report</button>
                </div>
                <br>
                <br>
            
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>All Analyzers Report
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body"> 
                            
                                    
                                <h2 style="text-align: center;"> All Analyzers Report
                                    
                                </h2>
                            
                                
                            
                            <table class="table table-bordered " id="table">
                                <?php
                                //Using PDO Method
                                $sql = "SELECT id,name,analyzerunit FROM analyzer ORDER BY id DESC";
                                $statement = $connection->prepare($sql);
                                $statement->execute();
                                $analyzerDetails = $statement->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <thead>
                                    <tr class="filters">
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Month Number</th>
                                        <?php foreach($analyzerDetails as $analyzerD): ?>
                                        <th style="text-align: center;"><?= $analyzerD->name; ?> - <?= $analyzerD->analyzerunit; ?> </th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <?php
                                
                    
                        //SELECT analyzer.id, analyzer.name,analyzer.analyzerunit, analyzerreading.date, analyzerreading.monthnumber,analyzerreading.valueunits FROM analyzer,analyzerreading WHERE analyzer.id=analyzerreading.analyzerid ORDER BY analyzerreading.monthnumber ASC

                                //For Value Units
                                $sqlVU = "SELECT DATE_FORMAT(date,'%d-%m-%y') as dateOnly,monthnumber,valueunits FROM analyzerreading";
                                $resultVU = mysqli_query($conn, $sqlVU);
                                
                                ?>
                                <tbody>
                                    <?php
                                        $check = 0;
                                while($rowVU = mysqli_fetch_assoc($resultVU)){ ?>
                                    
                                    <?php
                                        if ($check == 0) {
                                        
                                    ?>
                                      <tr>
                                        <td style="text-align: center;"><?= $rowVU["dateOnly"]; ?></td>
                                        <td style="text-align: center;"><?= $rowVU["monthnumber"]; ?></td>
                                    <?php
                                        }
                                    ?>
                                        <td style="text-align: center;"><?= $rowVU["valueunits"]; ?></td>

                                    <?php
                                    $check = $check+1;
                                    if ($check==5) {
                                        $check=0;
                                        ?></tr>
                                        <?php
                                    }
                                } 
                                ?>                                 
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
