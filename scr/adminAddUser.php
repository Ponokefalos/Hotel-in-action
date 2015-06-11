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

    <link rel="stylesheet" type="text/css" href="mainstyle.css">

    <?php
   // include('scr/includes/header.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('RegisterConnectToDB.php');

    ?>

</head>

<body style="background-color:#D7D7D7">

<div id="conteinerMarketing" class="container marketing">

    <div class="head_title">

        <h2><i> Προσθήκη νέου χρήστη</i></h2>
        <hr class="featurette-divider">

    </div>

    <div class="container marketing">
        <form role="form" action="registers.php" method="post" enctype="multipart/form-data">
            <div class="form-group" id="personal-info">
                <label>Προσωπικά Στοιχεία</label>

                <div class="form-group" id="sex">
                    <label>Φύλο</label>
                    <label class="radio-inline">
                        <input type="radio" name="sexMale" id="male" value="1"> Άρρεν
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexFemale" id="female" value="1"> Θύλη
                    </label>
                </div>
                <div class="form-group" id="name">
                    <input type="text" name="inputName" class="form-control" id="inputname" placeholder="Όνομα">
                </div>
                <div class="form-group" id="surname">
                    <input type="text" name="inputSurname" class="form-control" id="inputsurname" placeholder="Επίθετο">
                </div>
                <div class="form-group" id="dateofbirth">
                    <label for="inputdate">Ημερομηνία Γέννησης</label>
                    <input type="date" name="birthDate" class="form-control" id="inputdate">
                </div>
                <div class="form-group" id="email">
                    <label for="inputdate">Ηλεκτρονική Διεύθυνση</label>
                    <input type="email" name="email" class="form-control" id="inputemail"
                           placeholder="Ηλεκτρονική Διεύθυνση">
                </div>
            </div>

            <div class="form-group" id="companyinfo">
                <label>Στοιχεία Εταιρείας</label>

                <div class="form-group" id="companyname">
                    <input type="text" name="companyName" class="form-control" id="inputcompanyname"
                           placeholder="Επωνυμία Εταιρείας">
                </div>
            </div>

            <div class="form-group" id="options">
                <div class="form-group" id="newsletter">
                    <label for="input-newsletter">Ενημερωτικό Δελτίο</label>
                    <input type="checkbox" name="newsletter" id="input-newsletter">
                </div>
            </div>

            <div class="form-group" id="user_name">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="user_name" placeholder="Username">
            </div>

            <div class="form-group" id="password">
                <label for="input-pswd">Κωδικός Πρόσβασης</label>
                <input type="password" name="password" class="form-control" id="input-pswd">

                <label for="input-confirm-pswd">Επιβεβαίωση Κωδικού</label>
                <input type="password" name="confirmPassword" class="form-control" id="input-confirm-pswd">
            </div>
            <div class="form-group" id="file">
                <label for="input-photo">Φωτογραφία προφίλ</label>
                <input type="file" name="image" id="image"/>

            </div>


            <div class="form-group" id="extra">
                <div class="form-group" id="hoteladmin">
                    <label for="input-hotel-admin">Είστε Διαχειριστής κάποιου Ξενοδοχείου:</label>
                    <input type="checkbox" name="hotelAdmin" id="input-hotel-admin">
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Εγγραφή</button>
        </form>
    </div>
</div>


<?php
include ('includes/footer.php');
?>
</body>
</html>

