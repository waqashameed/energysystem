<?php
   // session_start();
   require 'session.php'; 
    require 'dbPDO.php';
    $sql = 'SELECT * FROM analyzer';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $analyzers = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 
<!DOCTYPE html>
<html>
<head>
    <title>ESMS | Analyzers </title>
    <meta charset="UTF-8">
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
    <link href="vendors/bootstrap-form-builder/css/custom.css" rel="stylesheet" />
    <link href="css/pages/formbuilder.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>ESMS | Analyzers List</title>
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
</head>
<body class="skin-josh">

    <div class="content">

        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        

        

        <?php endif ?>
    </div>

    <header class="header">
        <a href="index.php" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
          <!--   <img src="img/logo.png" alt="logo"> -->

          <h1>ESMS</h1>
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
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="img/authors/avatar3.jpg" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                                <p class="topprofiletext">Admin</p>
                            </li>
                            <!-- Menu Body -->




                            <li>
                                <a href="index.php">
                                    <i class="livicon" data-name="user" data-s="18"></i> Dashboard
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
 -->                                <div class="pull-right">
                                   <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                                       
                                    </a>



                                </div>


                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="advanced_tables.html"> <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i> </a>
                            </li>
                            <li>
                                <a href="tasks.html"> <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i> </a>
                            </li>
                            <li>
                                <a href="gallery.html"> <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i> </a>
                            </li>
                            <li>
                                <a href="users_list.html"> <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" id="menu">
                        <li>
                            <a href="index.php">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Analyzer</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active" id="active">
                                    <a href="form_builder.php">
                                        <i class="fa fa-angle-double-right"></i> View Analyzers
                                    </a>
                                </li>
                                <li>
                                    <a href="form_examples.php">
                                        <i class="fa fa-angle-double-right"></i> Analyzer Graphs
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

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Analyzer</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li class="active">View Analyzer</li>
                </ol>
            </section>
            <!--section ends-->
             <div class="card-header">
   <!--    <h2>Analyzers List</h2> -->
                <a style="float: left;" class="nav-link btn btn-info" href="create.php">Add Analyzer</a>

            </div>
    
        <div align="center" class="well" >
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
             <?php
            if(isset($_REQUEST['createMsg']) && $_REQUEST['createMsg'] == 'success'){
        ?>
            <p>Analyzer's data inserted successfully!</p>
        <?php
            }
            elseif (isset($_REQUEST['createMsg']) && $_REQUEST['createMsg'] == 'failure') {
        ?>
                <p style="color: red">*** Failed to insert analyzer's data, please contact your developer for further help. ***</p>
        <?php
            }

            if(isset($_REQUEST['editMsg']) && $_REQUEST['editMsg'] == 'success'){
        ?>

            <p>Analyzer's data updated successfully!</p>

        <?php
            }
            elseif (isset($_REQUEST['editMsg']) && $_REQUEST['editMsg'] == 'failure') {
        ?>
                <p style="color: red">*** Failed to update analyzer's data, please contact your developer for further help. ***</p>
        <?php
            }

            if(isset($_REQUEST['deleteMsg']) && $_REQUEST['deleteMsg'] == 'success'){
        ?>
            <p>Analyzer's data deleted successfully!</p>
        <?php
            }
            elseif (isset($_REQUEST['deleteMsg']) && $_REQUEST['deleteMsg'] == 'failure') {
        ?>
                <p style="color: red">*** Failed to delete analyzer's data, please contact your developer for further help. ***</p>
        <?php
            }
        ?>

        </div>

<center>






<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white">        
                    </i> Analyzers List
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Name</th>
                                <th>Description</th>
                                <th>Unit</th>
                                <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($analyzers as $analyzer): ?>
                        <tr>
                            <td><?= $analyzer->name; ?></td>
                            <td><?= $analyzer->description; ?></td>
                            <td><?= $analyzer->analyzerunit; ?></td>
                                  <!--       <td><?= $person->status; ?></td> -->
                            <td>
                                <a href="edit.php?id=<?= $analyzer->id ?>" class="btn btn-info">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $analyzer->id ?>" class='btn btn-danger'>Delete</a>
                                <a href="import.php?id=<?= $analyzer->id ?>" class="btn btn-primary">Import CSV</a>
                            </td>
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
                                <h4 class="modal-title" id="user_delete_confirm_title">Delete User</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this user? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <a href="deleted_users.html" class="btn btn-danger">Delete</a>
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
</script>




























  

   
<?php require 'footer.php'; ?>

</center>














    <!-- right-side -->
    <!-- ./wrapper -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script data-main="vendors/bootstrap-form-builder/js/main-built.js" src="vendors/bootstrap-form-builder/js/lib/require.js"></script>
    <!-- end of page level js -->
</body>

</html>
