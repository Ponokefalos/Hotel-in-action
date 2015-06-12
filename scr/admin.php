<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Προσθήκη νέου χρήστη</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="mainstyle.css">

    <?php
    include('includes/header.php');
    include('includes/navbar.php');

    ?>

    <!-- <div
            style="border:2px solid #ccc; width:100%;height:300px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
            <?php /*include('adminViewAuctions.php'); */ ?>
        </div>-->
</head>

<body style="background-color:#D7D7D7">

<div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->

    <div class="head_title">
        <div class="addNewElement">
            <button onclick="location.href ='adminNewHotel.php' " ; type="submit" class="btn btn-primary">+ Νέο
                Ξενοδοχείο
            </button>
        </div>
        <p>
        <h3><i>Ξενοδοχεία</i></h3></p>
        <hr class="featurette-divider">
    </div>

    <div
            style="border:2px solid #ccc; width:100%;height:300px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
            <?php include('adminViewHotels.php');  ?>
        </div>
    <br><br><br>

    <div class="head_title">
        <div class="addNewElement">
            <button onclick="location.href ='adminNewAuction.php' " ; type="submit" class="btn btn-primary">+ Νέα
                Δημοπρασία
            </button>
        </div>
        <p>
        <h3><i>Δημοπρασίες</i></h3></p>
        <hr class="featurette-divider">
    </div>

    <div
        style="border:2px solid #ccc; width:100%;height:300px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
        <?php /*include('adminViewAuctions.php');*/  ?>
    </div>

    <br><br><br>

    <div class="head_title">
        <div class="addNewElement">
            <button onclick="location.href ='adminAddUser.php' " ; type="submit" class="btn btn-primary">+ Νέoς
                Χρήστης
            </button>
        </div>
        <p>
        <h3><i>Χρήστες</i></h3></p>
        <hr class="featurette-divider">
    </div>

    <div
        style="border:2px solid #ccc; width:100%;height:300px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
        <?php include('adminViewUsers.php');  ?>
    </div>


    <div class="container marketing">
    </div>
</div>

<?php
include('includes/footer.php');
?>
</body>
</html>



