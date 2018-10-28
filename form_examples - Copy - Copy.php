<?php 
//index.php

    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

    
$connect = mysqli_connect("localhost", "root", "", "energysystemmanage");
$query = "SELECT * FROM analyzerreading";
$result = mysqli_query($connect, $query);

$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  //echo $row;
 //$chart_data .= "{ excel_name:'".$row["excel_name"]."', excel_email:".$row["excel_email"]."},";
 $chart_data .= "{ date:'".$row["date"]."', valueunits:".$row["valueunits"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

//echo $chart_data;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Energy System Management</title>
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
          
<h1>Energy</h1>
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
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                            <span class="label label-success">4</span>
                        </a>
                         <ul class="dropdown-menu dropdown-messages pull-right">                             <li class="dropdown-title">4 New Messages</li>                             <li class="unread message">                                 <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>                                     <img src="img/authors/avatar.jpg" class="img-responsive message-image" alt="icon" />                                     <div class="message-body">                                         <strong>Riot Zeast</strong>                                         <br>Hello, You there?                                         <br>                                         <small>8 minutes ago</small>                                     </div>                                 </a>                             </li>                             <li class="unread message">                                 <a href="javascript:;" class="message">                                     <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>                                     <img src="img/authors/avatar1.jpg" class="img-responsive message-image" alt="icon" />                                     <div class="message-body">                                         <strong>John Kerry</strong>                                         <br>Can we Meet ?                                         <br>                                         <small>45 minutes ago</small>                                     </div>                                 </a>                             </li>                             <li class="unread message">                                 <a href="javascript:;" class="message">                                     <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">                                         <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>                                     </i>                                     <img src="img/authors/avatar5.jpg" class="img-responsive message-image" alt="icon" />                                     <div class="message-body">                                         <strong>Jenny Kerry</strong>                                         <br>Dont forgot to call...                                         <br>                                         <small>An hour ago</small>                                     </div>                                 </a>                             </li>                             <li class="unread message">                                 <a href="javascript:;" class="message">                                     <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">                                         <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>                                     </i>                                     <img src="img/authors/avatar4.jpg" class="img-responsive message-image" alt="icon" />                                     <div class="message-body">                                         <strong>Ronny</strong>                                         <br>Hey! sup Dude?                                         <br>                                         <small>3 Hours ago</small>                                     </div>                                 </a>                             </li>                             <li class="footer">                                 <a href="#">View all</a>                             </li>                         </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-warning">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
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
                                <p class="topprofiletext">Riot Zeast</p>
                            </li>
                            <!-- Menu Body -->
                            <li>                                 <a href="view_user.html">                                     <i class="livicon" data-name="user" data-s="18"></i> My Profile                                 </a>                             </li>                             <li role="presentation"></li>                             <li>                                 <a href="adduser.html">                                     <i class="livicon" data-name="gears" data-s="18"></i> Account Settings                                 </a>                             </li>                             <!-- Menu Footer-->                             <li class="user-footer">                                 <div class="pull-left">                                     <a href="lockscreen.html">                                         <i class="livicon" data-name="lock" data-s="18"></i> Lock                                     </a>                                 </div>                                 <div class="pull-right">                                     <a href="login.html">                                         <i class="livicon" data-name="sign-out" data-s="18"></i> Logout                                     </a>                                 </div>                             </li>
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
                       <ul class="sidebar_threeicons">                             <li>                                 <a href="advanced_tables.html">                                     <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>                                 </a>                             </li>                             <li>                                 <a href="tasks.html">                                     <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i>                                 </a>                             </li>                             <li>                                 <a href="gallery.html">                                     <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i>                                 </a>                             </li>                             <li>                                 <a href="users_list.html">                                     <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>                                 </a>                             </li>                         </ul>
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
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Analyzers</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="form_builder.php">
                                        <i class="fa fa-angle-double-right"></i>
                                       Upload Data
                                    </a>
                                </li>
                               


                            </ul>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">Graph</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active" id="active">
                                    <a href="form_examples.php">
                                        <i class="fa fa-angle-double-right"></i>
                                        MF1 Feeder
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                       









                      
                                              </ul>
                    <!-- END SIDEBAR MENU --> </div>
            </section>
            <!-- /.sidebar --> </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Mf1 Feeder</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Form Examples</li>
                </ol>
            </section>
            <!--section ends-->
          







<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">MF1 Feeder</h2>
   <h3 align="center">..</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['data', 'valueunits'],
 labels:['KWH', 'valueunits '],
 hideHover:'auto',
 stacked:true
});
</script>



















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