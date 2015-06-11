<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel Nefeli</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" >
    <link href="../css/navbar.css" rel="stylesheet">

    <link href="../css/HotelNefeliStatic_Style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

    <script type="text/javascript">
        function colorChange () {
            var bgColor= prompt("Enter hex color","");
            document.body.style.backgroundColor= bgColor;
        }
    </script>

    <!-- ------------------------- Google Maps Script Required --------------------------->

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript">
        function initialize() {
            var myLatlng = new google.maps.LatLng(37.796412, 26.702513);
            var mapOptions = {
                zoom: 15,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!'
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);


    </script>

    <!-- ------------------------------------------------------------------------------------------------------->

</head>

<body style="background-color:#D7D7D7">





<!--  ---------------------------------------------------------- NAV BAR OLD ----------------------------
   <div class="navbar-wrapper" style="margin-left: 450px;">
       <div class="container" id="nav"  style="margin-top: 15px; width: auto">
           <ul  class="nav navbar-nav">
               <li><a href="index.php">Αρχική</a></li>
               <li><a href="hotel.php">Ξενοδοχεία</a></li>
               <li><a href="auction.php">Δημοπρασίες</a></li>
               <li><a href="about.php">Σχετικά με Εμάς</a></li>
               <li><a href="contact.php">Επικοινωνία</a></li>
           </ul>
       </div>
   </div>
</div>
<!--====================================================================================================================================-->

<!------------------------------------------------------ HEADER  --------------------------------------------------------------------------- -->
<div class="container" style="margin-top: 10px;" id="headerWithoutNavBar">
    <div style="float: right;">
        <form class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            <button type="button" class="btn btn-primary">Sign in</button>
            <a href="registers.php"><button type="button" class="btn btn-primary">Register</button></a>
        </form>
    </div>
    <div id="photoContainer">
        <img class="logoImage">
    </div>
</div>
<!--====================================================================================================================================-->

<!------------------------------------------------ CURRENT NAVBAR-------------------------------------------------------------------------------------->
<div class="navbar-wrapper" >
    <div class="container" id="nav" >
        <nav id="navtag" role="navigation" style=" margin-top: 50px;"> <!-- class="navbar navbar-inverse navbar-static-top" -->
            <div class="container" style="width: auto;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--
                    <a class="navbar-brand" href="http://www.jssor.com/index.php">Bootstrap Carousel</a>
                         -->
                </div>
                <div id="navbar" > <!-- class="navbar-collapse collapse" -->
                    <ul  class="nav navbar-nav"> <!---->
                        <li><a href="index.php">Αρχική</a></li>
                        <li><a href="hotel.php">Ξενοδοχεία</a></li>
                        <li><a href="auction.php">Δημοπρασίες</a></li>
                        <li><a href="about.php">Σχετικά με Εμάς</a></li>
                        <li><a href="contact.php">Επικοινωνία</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--====================================================================================================================================-->



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div id="conteinerMarketing" class="container marketing" ><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->



    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">

        <p><h3><i> Ξενοδοχεία </i></h3></p>
        <hr class="featurette-divider">
    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->
    <div id="auction" class="container marketing">
        <div class="row">
            <div  id="pictures" class=" col-md-6">
                <img class="img-thumbnail"src="http://q-ec.bstatic.com/images/hotel/max1024x768/296/2962528.jpg">
            </div>
            <div id="details" class="col-md-6">

                <div id="title">
                    <h1 style="color: #204d74;"></h1>
                </div>

                <div class="rating">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
                <br>
                <div id="short-description">
                    <p>Το Nefeli Hotel βρίσκεται σε απόσταση 150μ. από την παραλία στο Καρλόβασι, σε ένα καταπράσινο σημείο της Σάμου. Διαθέτει μια φιλική προς το περιβάλλον εξωτερική πισίνα, υδρομασάζ και δωρεάν Wi-Fi.</p>
                </div>
            </div>
        </div>
        <br>
        <div id="full-description">
            <p>Τα κλιματιζόμενα δωμάτια του Nefeli είναι επιπλωμένα σε παραδοσιακό στιλ. Διαθέτουν όλα μπαλκόνι και είναι εξοπλισμένα με τηλεόραση, ψυγείο και τηλέφωνο.

                Δίπλα στην πισίνα υπάρχει βεράντα, όπου οι επισκέπτες μπορούν να κάνουν ηλιοθεραπεία και να απολαύσουν δροσερά αναψυκτικά και σνακ από το μπαρ της πισίνας.

                Άλλες εγκαταστάσεις περιλαμβάνουν lounge τηλεόρασης, αίθουσα ανάγνωσης, τραπεζαρίες και χώρο φύλαξης αποσκευών.

                Το Nefeli Hotel απέχει 300μ. από το κέντρο της πόλης και μόλις 1χλμ. από το Λιμάνι του Καρλοβασίου.</p>
        </div>
        <hr class="featurette-divider">
        <div id="map-canvas" class="img-thumbnail"></div>


    </div>


</div><!-- /.container -->
<br><br><br>



<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; Your Hotel In Action 2015. &middot; <a href="#">Privacy</a> &middot; </p>
    <button type="button" class="btn btn-warning" onclick="colorChange()">Bg Changer</button>
    <button type="button" class="btn btn-warning" onclick="colorChange()">Conteiner Changer</button>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>

<!-- jssor slider scripts-->
<!-- use jssor.js + jssor.slider.js instead for development -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="../js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {

        var options = {
            $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
            $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                $Scale: false                                   //Scales bullets navigator or not while slider scale
            },

            $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };

        //Make the element 'slider1_container' visible before initialize jssor slider.
        $("#slider1_container").css("display", "block");
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
                jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
</body>
</html>