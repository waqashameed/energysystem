<?php 
    require 'session.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/app.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="vendors/c3/c3.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/morrisjs/morris.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/piecharts.css" rel="stylesheet" type="text/css" />
    <script>
window.onload = function () {
    var pie = new d3pie("#pie3", {
        size: {
            pieOuterRadius: "100%",
            canvasHeight: 350
        },
        data: {
            sortOrder: "value-asc",
            smallSegmentGrouping: {
                enabled: true,
                value: 2,
                valueType: "percentage",
                label: "Other birds"
            },
            content: [
                { label: "Bushtit", value: 5, color:"#418BCA" },
                { label: "Chickadee", value: 2, color:"#01BC8C"},
                { label: "Elephants", value: 6, color:"#F89A14"},
                { label: "Killdeer", value: 3, color:"#67C5DF"},
                { label: "Caspian Tern", value: 2,color:"#EF6F6C"},
                { label: "Blackbird", value: 1,color:"#418BCA"},
                { label: "Song Sparrow", value: 6,color:"#01BC8C"},
                { label: "Blue Jay", value: 5, color:"#01BC8C"},
                { label: "Black-throated Gray warbler", value: 1, color:"#F89A14"},
                { label: "Pelican", value: 6, color:"#67C5DF"},
                { label: "Bewick's Wren", value: 5, color:"#EF6F6C"},
                { label: "Cowbird", value: 1, color:"#EF6F6C"},
                { label: "Fox Sparrow", value: 6, color:"#EF6F6C"},
                { label: "Common Yellowthroat", value: 5, color:"#418BCA"},
                { label: "Virginia Rail", value: 1, color:"#418BCA"},
                { label: "Sora", value: 1, color:"#01BC8C"},
                { label: "Osprey", value: 1, color:"#01BC8C"},
                { label: "Merlin", value: 1, color:"#F89A14"},
                { label: "Kestrel", value: 1, color:"#67C5DF"}
            ]
        },
        tooltips: {
            enabled: true,
            type: "placeholder",
            string: "{label}, {value}, {percentage}%"
        }
    });
}
//Pie Chart

</script>
    
</head>
<body>

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
        


<head>
    <meta charset="UTF-8">
    <title>Energy System</title>
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
    <link href="vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="vendors/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/pages/only_dashboard.css" />
    <style type="text/css">
    #line-chart{
        min-height: 250px;
    }
    </style>
    <!--end of page level css-->
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
                        <li class="active">
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
                                       Analyzers Graph
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
                       <li>
                            <a href="generate_bill.php">
                                <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Generate Bill</span>
                            </a>
                        </li>
                       <?php
                            }                           
                        ?>
                    </ul>
                    </div>
                </section>
            </aside>
    <br>
    <br>
    <!--<div id="chartContainer" style="height: 500px; width: 80%; float: right;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>-->
        <div id="chartContainer" style="height: 500px; width: 80%; float: right;">
       <label class="label label-success">Line Chart</label>
      <div id="line-chart"></div>
      <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> D3 Pie chart with small segment
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div id="pie3"></div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>

        <!-- right-side -->
    
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/flotchart/js/jquery.flot.js"></script>
    <script type="text/javascript" src="vendors/flotchart/js/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="vendors/flotchart/js/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="vendors/d3/d3.min.js"></script>
    <script type="text/javascript" src="vendors/d3pie/d3pie.min.js"></script>
    <script type="text/javascript" src="vendors/c3/c3.min.js"></script>
    <script type="text/javascript" src="vendors/morrisjs/morris.min.js"></script>
   <!-- <script type="text/javascript" src="js/pages/custompiecharts.js"></script>-->
    <!-- end of page level js -->
</body>

</html>