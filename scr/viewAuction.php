<?php
/**
 * Created by PhpStorm.
 * User: arist
 * Date: 11-Jun-15
 * Time: 19:23
 */
    include('ArizFunctions.php');

    //get auction
    $id = htmlspecialchars($_GET["a"]);

    global $link;
    include ('RegisterConnectToDB.php');
    $auction = select_auction_by_id($id,$link);
    $rating = select_auction_avg_rating($id,$link);
    $ftime= new DateTime($auction['finishing_date']);
    $now = new DateTime();
    $time = date_diff($now,$ftime);
    $lastbid= select_auction_last_bid($id,$link)
?>

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
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">

    <link href="../css/nefeliAuctionStyle.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <![endif]-->

    <?php
    include('includes/header.php');
    include('includes/navbar.php');
    ?>

</head>

<body style="background-color:#D7D7D7">

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div id="conteinerMarketing" class="container marketing shadowStyle" ><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->



    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">

        <p><h3><i> Ξενοδοχεία </i></h3></p>
        <hr class="featurette-divider">
    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->
    <div id="auction">
        <div class="row">
            <div  id="pictures" class=" col-md-6">
                <?php echo '<img src="data:image;base64,' . base64_encode($auction["auction_file"]) . '" width=400 height=400/>'; ?>
            </div>
            <div id="details" class="col-md-6">

                <div id="title">
                    <h1><?php echo $auction['auction_hotel_name'];?></h1>
                </div>

                <div class="rating">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    <h3><?php echo $rating;?></h3>
                </div>
                <br>
                <div id="short-description">
                    <p> Υπολοιπόμενος Χρόνος Δημοπρασίας: </p>
                    <p id="auctionTimeRemaining">
                        <?php
                        $str = $time->format('%R');
                           if ($str==='-'){
                                echo 'Έχει λήξει.';
                            }else
                            echo  $time->format('%a Μέρες %H Ώρες %i Λεπτά');
                        ?>
                    </p>
                    <br>
                    <p>Τελευταία Προσφορά: <?php echo $lastbid?> <span>€</span></p>
                    <br>
                    <form method="post" class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="newAmount">Amount (in dollars)</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="text" name="timi" class="form-control" id="newAmount" placeholder="Ποσό">
                                <div class="input-group-addon">.00</div>
                            </div>
                        </div>
                        <button type="submit" name="bidButton"class="btn btn-primary">Προσθήκη Προσφοράς</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="full-description">
            <p> <h4>Περιγραφή</h4>
                <?php echo $auction['Description'];?>
            </p>
        </div>
    </div>


</div><!-- /.container -->
<br><br><br>



<?php
    include('includes/footer.php');
    include_once('ArizFunctions.php');
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['bidButton'])) {
        $bid_given = $_POST['timi'];
        if ($bid_given>$lastbid){
            $bool=insert_bid($_SESSION['user_id'],$auction['auction_id'],$bid_given,getCurrentDate(),$link);
            if ($bool){
                showAlertDialog("Επιτυχία");
             /*   echo '<script > document.location = "viewAuction.php" </script>';*/
            }else{
                showAlertDialog("Apotυχία");
            }
        }else{

        }
    }
?>
</body>
</html>