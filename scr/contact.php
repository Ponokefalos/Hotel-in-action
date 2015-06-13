<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Επικοινωνία</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">

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

<div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->


    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">

        <p>

        <h3><i>Επικοινωνία</i></h3></p>
        <hr class="featurette-divider">
    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->

    <p>Επικοινωνίστε με τους υπεύθυνους της σελίδας, συμπληρώνοντας την παρακάτω φόρμα με τα στοιχεία σας.</p>

    <form id="contact_form" action="#" method="post" name="contact_form">
        <br><br><br>
        <label>Your name:</label><br>
        <input class="form-control" type="text" name="name">
        <br>
        <br>
        <label>Your email:</label><br>
        <input class="form-control" type="email" name="email">
        <br>
        <br>
        <label>Your message:</label><br>
        <textarea class="form-control" id="user_input" name="user_input" cols="131" rows="7"></textarea>
        <br>
        <br>
        <input type="submit" class="btn btn-primary" style="overflow:hidden; resize:none;" name="submit" id="submit"
               value="Υποβολή">

    </form>

</div>
<!-- /.container -->
<br><br><br>



<? include('includes/footer.php'); ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>


<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $emailBody = mysqli_real_escape_string($link, $_POST['user_input']);

    if (isset($name) && isset($email) && isset($emailBody)) {


        $to = 'filtatos.h.x@gmail.com';
        $subject = 'From Auction Hotels';
        $message = $emailBody;
        $headers = 'From: ' . $email . '  ' . $name . "\r\n" .
            'Reply-To: hades@tartara.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        showAlertDialog("Η αποστολή του μηνύματος ολοκληρώθηκε");
    } else {
        showAlertDialog("Συμπλήρωσε όλες τις πληροφορίες");
    }
}


?>
</body>
</html>