<?php
//include config
require_once('../ArtGlom/includes/config.php');
require_once('../ArtGlom/includes/insert.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Welcome To Artglom Panel</title>

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

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="admin.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered">Art-Glom</h5>

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
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Add Artist</h3>

            <div class="row">
                <div class="col-lg-12 main-chart">

                    <div class="row mtbox">
                        <?php
                        if(isset($_POST['submit'])){

                            $_POST = array_map( 'stripslashes', $_POST );

                            //collect form data
                            extract($_POST);

                            //very basic validation

                            if($admin ==''){
                                $error[] = 'Please check Admin';
                            }

                            if($title ==''){
                                $error[] = 'Please enter the title.';
                            }

                            if($meduim ==''){
                                $error[] = 'Please enter the Meduim.';
                            }

                            if($style ==''){
                                $error[] = 'Please enter the Style.';
                            }
                            if($rightp ==''){
                                $error[] = 'Please enter the Height.';
                            }
                            if($leftp ==''){
                                $error[] = 'Please enter the Width.';
                            }
                            if($subject ==''){
                                $error[] = 'Please enter the Subject.';
                            }
                            if($price ==''){
                                $error[] = 'Please enter the Price.';
                            }

                            if(!isset($error)){

                                try {

                                    //insert into database
                                    $stmt = $db->prepare('INSERT INTO arts (admin,postImg,title,meduim,style,rightp,leftp,subject,price) VALUES (:admin,:postImg, :title, :meduim, :style, :rightp, :leftp, :subject,:price)') ;
                                    $stmt->execute(array(
                                        ':admin' => $admin,
                                        ':postImg' => $postImg,
                                        ':title' => $title,
                                        ':meduim' => $meduim,
                                        ':style' => $style,
                                        ':rightp' => $rightp,
                                        ':leftp' => $leftp,
                                        ':subject' => $subject,
                                        ':price' => $price
                                    ));

                                    //redirect to index page
                                    header('Location: index.php?action=added');
                                    exit;

                                } catch(PDOException $e) {
                                    echo $e->getMessage();
                                }

                            }

                        }

                        //check for any errors
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="col-lg-12 form-panel form-group col-sm-2 col-sm-2 control-label">'.$error.'</p>';
                            }
                        }

                        ?>
                        <div class="col-lg-12">
                            <div class="form-panel">
                        <form id="main-content" class="form-group" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Check as admin</label>
                                <div class="col-sm-10">
                            <input class="form-control" type="checkbox" name="admin" value='checked'>
                                </div>
                            </div>
                            <p><label>Upload your Image</label><br />
                                <input class="btn btn-primary"  type="file" name="file" value='/includes/insert.php'/>
                            </p>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                            <input class="form-control round-form" type='text' name='title' id="title"</h3>
                                    </div>
                            <p><label>Subject</label><br />
                                <select  class="form-control" name="subject" value='<?php if(isset($error)){ echo $_POST['subject'];}?>'>
                                    <option value="Acrylic">Acrylic</option>
                                    <option value="Airbrush">Airbrush</option>
                                    <option value="Aerosol">Aerosol</option>
                                    <option value="Aquatint">Aquatint </option>
                                    <option value="Ball Point">Ball Point</option>
                                    <option value="Ceramic">Ceramic</option>
                                    <option value="Chalk">Chalk</option>
                                    <option value="Charcoal">Charcoal</option>
                                    <option value="Decoupage">Decoupage</option>
                                    <option value="Digital Art">Digital Art</option>
                                    <option value="Drypoint">Drypoint</option>
                                    <option value="Dye">Dye</option>
                                    <option value="Enamel">Enamel</option>
                                    <option value="Engraving">Engraving</option>
                                    <option value="Environmental">Environmental</option>
                                    <option value="Etching">Etching</option>
                                    <option value="Fabric">Fabric</option>
                                    <option value="Fibre">Fibre</option>
                                    <option value="Fibre Glass">Fibre Glass</option>
                                    <option value="Found Objects">Found Objects</option>
                                    <option value="Geletin">Geletin</option>
                                    <option value="Gesso">Gesso</option>
                                    <option value="Glass">Glass</option>
                                    <option value="Gouache">Gouache</option>
                                    <option value="Granite">Granite</option>
                                    <option value="Graphite">Graphite</option>
                                    <option value="Ink">Ink</option>
                                    <option value="Latex">Latex</option>
                                    <option value="Leather">Leather</option>
                                    <option value="Marble">Marble</option>
                                    <option value="Metals">Metals</option>
                                    <option value="Mosaic">Mosaic</option>
                                    <option value="Neon">Neon</option>
                                    <option value="New Media">New Media</option>
                                    <option value="Oil Paint">Oil Paint</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Paper Mache">Paper Mache</option>
                                    <option value="Pastel">Pastel</option>
                                    <option value="Pen and Ink">Pen and Ink</option>
                                    <option value="Pencil">Pencil</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Plaster">Plaster</option>
                                    <option value="Plastic">Plastic</option>
                                    <option value="Pottery">Pottery</option>
                                    <option value="Resin">Resin</option>
                                    <option value="Rubber">Rubber</option>
                                    <option value="Screen Print">Screen Print</option>
                                    <option value="Stencil">Stencil</option>
                                    <option value="Steel">Steel</option>
                                    <option value="Stone">Stone</option>
                                    <option value="Watercolour">Watercolour</option>
                                    <option value="Wax">Wax</option>
                                    <option value="Wood">Wood</option>
                                    <option value="Sculpture">Sculpture</option>
                                    <option value="Abstract Expressionism">Abstract Expressionism</option>
                                    <option value="Other">Other</option>
                                </select>
                            </p>

                            <h3><label>Style </label><br />
                                <select class="form-control" name="style" value='<?php if(isset($error)){ echo $_POST['style'];}?>'>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Abstract Expressionism">Abstract Expressionism</option>
                                    <option value="Art Deco">Art Deco</option>
                                    <option value="Conceptual">Conceptual </option>
                                    <option value="Cubism">Cubism</option>
                                    <option value="Dada">Dada</option>
                                    <option value="Documentary">Documentary</option>
                                    <option value="Expressionism">Expressionism</option>
                                    <option value="Fine Art">Fine Art</option>
                                    <option value="Folk">Folk</option>
                                    <option value="Illustration">Illustration</option>
                                    <option value="Impressionism">Impressionism</option>
                                    <option value="Art Deco">Art Deco</option>
                                    <option value="Minimalism">Minimalism</option>
                                    <option value="Modern">Modern</option>
                                    <option value="figurative">figurative</option>
                                    <option value="Photorealism">Photorealism</option>
                                    <option value="Pop Art">Pop Art</option>
                                    <option value="Portraiture">Portraiture</option>
                                    <option value="Realism">Realism</option>
                                    <option value="Street Art">Street Art</option>
                                    <option value="Surrealism">Surrealism</option>
                                    <option value="Graffiti">Graffiti</option>
                                    <option value="Digital Art">Digital Art</option>
                                    <option value="Hyper Realism">Hyper Realism</option>
                                    <option value="Fauvism">Fauvism</option>
                                    <option value="Neo Dada">Neo Dada</option>
                                    <option value="Neo Expressionism">Neo Expressionism</option>
                                    <option value="Social Realism">Social Realism</option>
                                    <option value="Suprematism">Suprematism</option>
                                    <option value="Colourfield">Colourfield</option>
                                    <option value="Feminist Art">Feminist Art</option>
                                    <option value="Contemporary">Contemporary</option>
                                    <option value="Futurism">Futurism</option>
                                    <option value="Aerosol">Aerosol</option>
                                    <option value="cartoon">cartoon</option>
                                    <option value="comics">comics</option>
                                    <option value="Stencil">Stencil</option>
                                    <option value="drawing">drawing</option>
                                    <option value="sculpture">sculpture</option>
                                    <option value="photography">photography</option>
                                    <option value="Other">Other</option>
                                </select>
                            </h3>


                            <h3><label>Meduim </label><br />
                                <select class="form-control" name="meduim" value='<?php if(isset($error)){ echo $_POST['meduim'];}?>'>
                                    <option value="Acrylic">Acrylic</option>
                                    <option value="Airbrush">Airbrush</option>
                                    <option value="Aerosol">Aerosol</option>
                                    <option value="Aquatint">Aquatint </option>
                                    <option value="Ball Point">Ball Point</option>
                                    <option value="Ceramic">Ceramic</option>
                                    <option value="Chalk">Chalk</option>
                                    <option value="Charcoal">Charcoal</option>
                                    <option value="Decoupage">Decoupage</option>
                                    <option value="Digital Art">Digital Art</option>
                                    <option value="Drypoint">Drypoint</option>
                                    <option value="Dye">Dye</option>
                                    <option value="Enamel">Enamel</option>
                                    <option value="Engraving">Engraving</option>
                                    <option value="Environmental">Environmental</option>
                                    <option value="Etching">Etching</option>
                                    <option value="Fabric">Fabric</option>
                                    <option value="Fibre">Fibre</option>
                                    <option value="Fibre Glass">Fibre Glass</option>
                                    <option value="Found Objects">Found Objects</option>
                                    <option value="Geletin">Geletin</option>
                                    <option value="Gesso">Gesso</option>
                                    <option value="Glass">Glass</option>
                                    <option value="Gouache">Gouache</option>
                                    <option value="Granite">Granite</option>
                                    <option value="Graphite">Graphite</option>
                                    <option value="Ink">Ink</option>
                                    <option value="Latex">Latex</option>
                                    <option value="Leather">Leather</option>
                                    <option value="Marble">Marble</option>
                                    <option value="Metals">Metals</option>
                                    <option value="Mosaic">Mosaic</option>
                                    <option value="Neon">Neon</option>
                                    <option value="New Media">New Media</option>
                                    <option value="Oil Paint">Oil Paint</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Paper Mache">Paper Mache</option>
                                    <option value="Pastel">Pastel</option>
                                    <option value="Pen and Ink">Pen and Ink</option>
                                    <option value="Pencil">Pencil</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Plaster">Plaster</option>
                                    <option value="Plastic">Plastic</option>
                                    <option value="Pottery">Pottery</option>
                                    <option value="Resin">Resin</option>
                                    <option value="Rubber">Rubber</option>
                                    <option value="Screen Print">Screen Print</option>
                                    <option value="Stencil">Stencil</option>
                                    <option value="Steel">Steel</option>
                                    <option value="Stone">Stone</option>
                                    <option value="Watercolour">Watercolour</option>
                                    <option value="Wax">Wax</option>
                                    <option value="Wood">Wood</option>
                                    <option value="Sculpture">Sculpture</option>
                                    <option value="Abstract Expressionism">Abstract Expressionism</option>
                                    <option value="Other">Other</option>
                                </select>
                            </h3>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Width</label>
                                    <div class="col-sm-10">
                                <input class="form-control round-form" type="text" name="leftp" value='<?php if(isset($error)){ echo $_POST['leftp'];}?>'>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Height </label>
                                            <div class="col-sm-10">
                             <input class="form-control round-form" type="text" name="rightp" value = '<?php if(isset($error)){ echo $_POST['rightp'];}?>'>
                                                </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Price</label>
                                                <div class="col-sm-10">

                                            <input class="form-control round-form" type="text" name="price" value='<?php if(isset($error)){ echo $_POST['price'];}?>'>
                                                    </div>
                                <h3><input class="btn btn-round btn-default" type='submit' name='submit' value="Insert Artist"></h3>
                            </div>
                        </form>

                    </div><! --/row -->
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2015 - <a href="http://www.spellad.com/">SpellAD LLC</a>
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
