<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white text-capitalize shadow d-lg-flex portfolio-navbar gradient" style="filter: blur(0px) brightness(89%) grayscale(0%) hue-rotate(0deg) invert(0%) saturate(100%);">
        <div class="container"><a class="navbar-brand logo" style="font-family: Montserrat, sans-serif;" href="index.html">Anthony DUPUY</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" style="font-family: Montserrat, sans-serif;" href="index.html">CV</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" style="font-family: Montserrat, sans-serif;" href="projets.html">Projets</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" style="font-family: Montserrat, sans-serif;" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>Contactez moi</h2>
                </div>
                <?php
                if (!empty($_POST)) {
                    $errors = array();

                    if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom'])) {
                        $errors['nom'] = "<b>Votre nom n'est pas valide</b>";
                        echo $errors['nom'];
                    } else if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "<b>Votre email n'est pas valide </b>";
                        echo $errors['email'];
                    } else if (empty($_POST['message'])) {
                        $errors['message'] = "<b>Aucun texte saisi";
                        echo $errors['message'];
                    } else {
                        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

                        $nom = $_POST['nom'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        if (get_magic_quotes_gpc()) {
                            $message = stripslashes($message);
                        }

                        $address = "anthony.dupuy@ynov.com";

                        $e_subject = '- Vous avez été contactez par ' . $nom . '.';

                        $e_body = "- Vous avez été contactez par $nom. \nAvec pour message :" . PHP_EOL . PHP_EOL;
                        $e_content = "\"$message\"" . PHP_EOL . PHP_EOL;
                        $e_reply = "- Pour contacter $ nom via email, voici l'email de $nom : $email";

                        $msg = wordwrap($e_body . $e_content . $e_reply, 70);

                        $headers = "De : $email" . PHP_EOL;
                        $headers .= "Répondre à : $email" . PHP_EOL;

                        if (mail(!$address, !$e_subject, !$msg, !$headers)) {
                            echo "<div class='alert alert-danger'><b>ERREUR</b></div>";
                        }
                        if (mail($address, $e_subject, $msg, $headers)) {
                            echo "<div class='alert alert-success'><b>Votre mail a bien été envoyé, il sera traité les meilleurs délais !</b></div>";
                        }
                    }
                }

                ?>
                <form method="POST" action="">
                    <div class="form-group"><label for="name">Votre nom</label><input class="form-control item" type="text" id="name" name="name"></div>
                    <div class="form-group"><label for="subject">Objet</label><input class="form-control item" type="text" id="subject"></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email"></div>
                    <div class="form-group"><label for="message">Message</label><textarea class="form-control item" id="message" name="message"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" style="background-color: #26619c;">Envoyer</button></div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a style="font-family: Montserrat, sans-serif;" href="index.html">CV</a><a style="font-family: Montserrat, sans-serif;" href="projets.html">Projets</a><a style="font-family: Montserrat, sans-serif;" href="contact.html">Contact</a></div>
            <div class="social-icons" style="filter: blur(0px) brightness(100%);"><a style="color: rgb(38,97,156);background-color: rgb(255,255,255);" href="https://www.linkedin.com/in/anthony-dupuy-0021b5152/"><i class="icon ion-social-linkedin-outline"></i></a><a style="color: rgb(38,97,156);background-color: rgb(255,255,255);" href="mailto:anthony.dupuy@ynov.com"><i class="icon ion-ios-email-outline"></i></a><a style="color: rgb(38,97,156);background-color: rgb(247,249,255);" href="https://www.facebook.com/AnthonyDpy"><i class="icon ion-social-facebook-outline"></i></a>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>