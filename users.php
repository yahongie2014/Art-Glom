<?php
//include config
require_once('../ArtGlom/includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){

    //if user id is 1 ignore
    if($_GET['deluser'] !='1'){

        $stmt = $db->prepare('DELETE FROM blog_members WHERE memberID = :memberID') ;
        $stmt->execute(array(':memberID' => $_GET['deluser']));

        header('Location: users.php?action=deleted');
        exit;

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Adduser-Artglom Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="admin.php" class="logo"><b>Art-Glom</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->

            <!-- settings end -->
            <!-- inbox dropdown start-->

            <!--  notification end -->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered">Art-Glom</h5>
                <script language="JavaScript" type="text/javascript">
                    function deluser(id, title)
                    {
                        if (confirm("Are you sure you want to delete '" + title + "'"))
                        {
                            window.location.href = 'users.php?deluser=' + id;
                        }
                    }
                </script>
                <li class="mt">
                    <a class="active" href="admin.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>Control posts</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="add-post.php">Add Artist</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-cogs"></i>
                        <span>Control User</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="add-user.php">Adduser</a></li>
                        <li><a  href="edit-user.php">Edit profile</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Featured</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="Feature.php">Make Star</a></li>
                        <li><a  href="view.php">Make Super Star</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="li_display"></i>
                        <span>Lock Screen</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="lock_screen.php">Lock</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12 main-chart">

                    <div class="darkblue-panel" id="sortable">
                        <?php
                        //show message from add / edit page
                        if(isset($_GET['action'])){
                            echo '<h3>User '.$_GET['action'].'.</h3>';
                        }
                        ?>

                        <table class="table-responsive">
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            try {

                                $stmt = $db->query('SELECT memberID, username, email FROM blog_members ORDER BY username');
                                while($row = $stmt->fetch()){

                                    echo '<tr>';
                                    echo '<td>'.$row['username'].'</td>';
                                    echo '<td>'.$row['email'].'</td>';
                                    ?>

                                    <td>
                                        <a href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a>
                                        <?php if($row['memberID'] != 1){?>
                                            | <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
                                        <?php } ?>
                                    </td>

                                    <?php
                                    echo '</tr>';

                                }

                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
                    </div>

        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2015 - Spellad
            <a href="admin.php#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Art Glom!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://spellad.com" target="_blank" style="color:#ffd777">SpellAD LLC</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>


</body>
</html>
