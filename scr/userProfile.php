<?php
/*session_start();
*/?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ξενοδοχεία</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">
    <link href="../css/userProfileStyle.css" rel="stylesheet">
    <link href="../css/shadowStyle2.css.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/HotelFirstPage.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

<?php 
include ('includes/header.php');
include('includes/navbar.php');
include ('RegisterConnectToDB.php');

$search_result = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$search_result' ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);


$user = new User($row['name'], $row['surname'], $row['username'], $row['email'], $row['image']);

?>
</head>

<body style="background-color:#D7D7D7">





<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<br> <br><br>

<div class="container" id="backgroundContainerHolder">


    <div class="container" id="imageContainer">

        
         <div class="container" id="userImage">
            <?php 
            echo '<img src="data:image;base64,'.base64_encode( $user->image ).'" width=200 height=200/>';
            ?>
        </div>
    </div>
</div>

<div class="container" id="main_user_container">
    <div class="row ">
        <div class="col-xs-7 shadowStyle2" id="user_history">
            <div class="col-xs-7 main_profile_title shadowStyle2">
                <p>Ιστορικό Δημοπρασιών</p>
            </div>
            <div class="user_container">
                <p> SOme texts goes here, isws na min kanei o responsive table gia toso row me periexomena poy theloume.
                    Episis mporei to Istoriko na thelei kai mia row mono tou!</p>
                <p>sdasdas</p>
                <br>
                <div class="table-responsive">
                    <p>asdsdad</p>
                    <table class="table">
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>LAST</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                    </table>
                </div>
            </div>

            <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br>
        </div>


        <div class="col-xs-4 shadowStyle2" id="user_ratings">
            <div class="col-xs-4 main_profile_title shadowStyle2">
                <p>Βαθμολογια</p>
            </div>
            <div class="user_container">
            <p>Η Βαθμολογίας σας είναι:</p>
            <br>

            <p style="text-align: center"> 4.2 <br>
                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span> <br> <br>από 34 εγγεγραμένους
                χρήστες</p>
            <br><br><br><br><br>
        </div>
            </div>

    </div>

    <div class="row">
        <div class="col-xs-7 shadowStyle2" id="user_info">
            <div class="col-xs-7 main_profile_title shadowStyle2">
                <p>Πληροφορίες</p>
            </div>
            <div class="user_container">
                <form class="form-horizontal">

                    <table>
                        <tr>
                            <td><p> Όνομα Χρήστη: </p></td>
                            <td><?php
                            print($user->name);
                             ?></td>
                        </tr>
                        <tr>
                            <td><p> E-mail: </p></td>
                            
                            <td>
                            <?php 
                                print($user->email);
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td><p> Ιδιότητα: </p></td>
                            <td>
                                <?php
                                /*print($user->userType);*/
                                ?>
                            </td>
                        </tr>

                    </table>

                </form>
            </div>


            <br><br><br><br><br>
        </div>

    </div>

</div>


<!--*******************************************************************************************************************
<div id="conteinerMarketing" class="container marketing shadowStyle" >&lt;!&ndash; BG COLOR&ndash;&gt;




    &lt;!&ndash; Main Container body
  ============================================================================================= &ndash;&gt;
    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45; &ndash;&gt;
    <div class="head_title">

        <p><h3><i>Εδώ μπαινει το ονομα του χρήστη που θα παρεις απ το λογιν</i></h3></p>

        <hr class="featurette-divider">

    </div>
    &lt;!&ndash; =============================================PERIEXOMENO SELIDAS ================================================&ndash;&gt;

    <p class="infoTxt"></p>

    <br><br><br>

    <div class="container marketing">

        <br><br>

    </div>




    <br><br><br><br><br>


</div>&lt;!&ndash; /.container &ndash;&gt;
*******************************************************************************************************************-->

<br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br>

<?php 
include ('includes/footer.php');
?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>

<!-- jssor slider scripts-->
<!-- use jssor.js + jssor.slider.js instead for development -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="../js/jssor.slider.mini.js"></script>

</body>
</html>