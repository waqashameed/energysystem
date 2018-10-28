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



                    </ul>
                </div>
            </section>
        </aside>
        
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Invoice</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                    </li>
                    <li class="active">Invoice</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="livicon" data-name="money" data-size="14" data-loop="true" data-c="#fff" data-hc="#fff"></i> Invoice from <b>JOSH</b></h3>
                                <div class="pull-right pan_colors">
                                    <ul class="list-inline colors">
                                        <li class="bg-default"></li>
                                        <li class="bg-primary"></li>
                                        <li class="bg-success"></li>
                                        <li class="bg-warning"></li>
                                        <li class="bg-danger"> </li>
                                        <li class="bg-info"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                                <div class="row" style="padding: 15px;margin-top:5px;">
                                    <div class="col-md-6">
                                        <img src="img/logo2.png" alt="logo" class="img-responsive">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                            <strong>Pay To:</strong>
                                            <br>
                                            <strong>JOSH</strong>
                                            <br> 3946 Penn Street
                                            <br> Birmingham, AL 35209
                                            <br> josh@example.com
                                            <br> SALES TAX:254876
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 15px;">
                                    <div class="col-md-9 col-xs-6" style="margin-top:5px;">
                                        <strong>Invoice To:</strong>
                                        <br> Bryan C. Kurtz
                                        <br> 3848 Lunetta Street
                                        <br> Denton, TX 76201
                                        <br> LOCALITY
                                        <br> Region MV28SX
                                        <br> SALES TAX: 21456783
                                    </div>
                                    <div class="col-md-3 col-xs-6" style="padding-right:0">
                                        <div id="invoice" style="background-color: #eee;text-align:right;padding: 15px;padding-bottom:23px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">
                                            <h4><strong>Invoice INV001</strong></h4>
                                            <h4><strong>20 DEC 2015</strong></h4>
                                            Payment Terms: 15days
                                            <br> Payment Due by 01 Jan 2016
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding:15px;">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>SI No.</th>
                                                        <th>Details</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price($)</th>
                                                        <th>Tax</th>
                                                        <th>NetSubtotal($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>Volex 13A 2G DP White Chrome angled Edge</td>
                                                        <td>3</td>
                                                        <td>165.00</td>
                                                        <td>10.0%</td>
                                                        <td>500.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>Volex 1G 400W M/Lv Chrme Angled Edge</td>
                                                        <td>5</td>
                                                        <td>198.00</td>
                                                        <td>14.1%</td>
                                                        <td>1000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>Halolite Polished Chrome Circular Cabinet Downlight pack of 3</td>
                                                        <td>2</td>
                                                        <td>374.00</td>
                                                        <td>5.5%</td>
                                                        <td>750.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>10% Discount</td>
                                                        <td>225</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Net Total</td>
                                                        <td>2025.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>tax</td>
                                                        <td>599.40</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>TOTAL</strong></td>
                                                        <td><strong>2624.60</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div style="background-color: #eee;padding:15px;" id="footer-bg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Payment Details</strong>
                                            <br>
                                            <strong>Kayin Bank</strong>
                                            <br>
                                            <strong>Bank/Sort code</strong>: 32-25-85
                                            <br>
                                            <strong>Account Number</strong>: 54257963
                                            <br>
                                            <strong>Payment Reference</strong>: INV001
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pull-right">
                                                <strong>Other Information</strong>
                                                <br>
                                                <strong>Company Registration Number</strong>:254798621
                                                <br>
                                                <strong>Contact/PO</strong>:PO5876452
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-center"><strong>Payment should be made by bank transfer or cheque made by payable to Josh</strong></p>
                                    <div style="margin:10px 20px;text-align:center;" class="btn-section">
                                        <button type="button" class="btn btn-responsive button-alignment btn-info" data-toggle="button">
                                            <span style="color:#fff;" onclick="javascript:window.print();">
                                            <i class="livicon" data-name="printer" data-size="16" data-loop="true"
                                               data-c="#fff" data-hc="white" style="position:relative;top:3px;"></i>
                                            Print
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-responsive button-alignment btn-default" data-toggle="button">
                                            <span class="btn_send">
                                            <i class="livicon" data-name="check" data-size="16" data-loop="true"
                                               data-c="#111" data-hc="#111" style="position:relative;top:3px;"></i>
                                            Send Your Invoice
                                        </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        </aside>
        <!-- right-side -->
    </div>
    <!-- ./wrapper -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="js/pages/invoice.js" type="text/javascript"></script>
    <!-- end of page level js -->
       
</body>

</html>



































































