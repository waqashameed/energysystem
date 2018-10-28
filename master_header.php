<?php
    require 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ESMS | Graphs</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="css/app.css" rel="stylesheet"  type="text/css">
    <!-- end of global css -->
    <!--page level css -->
    <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
    <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css" />
    <!--end of page level css-->
</head>
<body class="skin-josh">
    <header class="header">
        <a href="index.html" class="logo">    
            <h1>ESMS</h1>
        </a>
        
           <!--  <img src="img/logo.png" alt="logo"></a> -->
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
                                <img src="img/authors/avatar3.jpg" width="90" class="img-circle img-responsive" height="90" alt="User Image"  />
                                <p class="topprofiletext">Admin</p>
                            </li>
                            <!-- Menu Body -->
                            <li role="presentation"></li> 
                            <!-- Menu Footer--> 
                            <li class="user-footer">     
                                <div class="pull-left">      
                                    <a href="lockscreen.html">      
                                </div>  
                                <div class="pull-right">                               
                                     <a href="index.php?logout='1'" style="color: red;">logout</a>
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
                                    <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true">
                                        
                                    </i>                                 
                                </a>                             
                            </li>                             
                            <li>                                 
                                <a href="tasks.html">                                     
                                    <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true">
                                        
                                    </i>                                 
                                </a>                             
                            </li>                             
                            <li>                                 
                                <a href="gallery.html">                                     
                                    <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true">
                                        
                                    </i>                                 
                                </a>                             
                            </li>                            
                            <li>                                 
                                <a href="users_list.html">                                     
                                    <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true">
                                        
                                    </i>                                 
                                </a>                             
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
                                <span class="title">Analyzers</span>
                                <span class="fa arrow"></span>
                            </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="analyzers_list.php">
                                            <i class="fa fa-angle-double-right"></i>
                                           View Analyzers
                                        </a>
                                    </li>

                                    <li class="active" id="active">
                                        <a href="allAnalyzerChart.php">
                                            <i class="fa fa-angle-double-right"></i>
                                           Analyzer Graphs
                                        </a>
                                    </li>
                                    <li>
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
                    </ul>
            </div>

                    <!-- END SIDEBAR MENU --> 
        </section>

            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Bar Graph</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Analyzers</a>
                    </li>
                    <li class="active">Analyzers Graph</li>
                </ol>
            </section>
            <!--section ends-->
<!DOCTYPE html>
<html>
 <head>
  <title>ESMS | Graphs </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 </head>
 <body>



    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="vendors/favicon/favicon.js"></script>
    <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <script src="vendors/iCheck/js/icheck.js"></script>
    <script src="js/pages/form_examples.js"></script>

    <!-- end of page level js -->
</body>
</html>