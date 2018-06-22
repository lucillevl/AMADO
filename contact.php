<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116153416-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116153416-1');
    </script>

</head>
<body>
<header>
    <!--INCLUDE NAV BARRE-->
    <?php
    $page = 'contact';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');


    if (isset($_POST['envoyer'])){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From:".ucwords(strtolower($_POST['nom']))." ".ucfirst(strtolower($_POST['prenom']))." <".$_POST['email'].">";
        $destinataire = "amado.diy@gmail.com";
        $sujet = ucfirst(strtolower($_POST['sujet']));
        $message = "<p>".ucfirst($_POST['message'])."</p>";

        mail($destinataire,$sujet,$message,$headers);


        $insert = $pdo->prepare("INSERT INTO messages(nom, prenom, email, sujet, message) VALUES (:nom,:prenom,:email,:sujet,:message)");

        $insert->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insert->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $insert->bindValue(':sujet', $_POST['sujet'], PDO::PARAM_STR);
        $insert->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

        $insertion = $insert->execute();

    }



    ?>




</header>

<main class="page-contact">
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7360.12902476346!2d2.334550602717651!3d48.868772383869306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3cf4eb73d5%3A0x95719384f2f9d47e!2sBourse!5e0!3m2!1sfr!2sfr!4v1520526844788" frameborder="0" style="border:0" allowfullscreen class="width-100 height-40"></iframe>
    </section>
    <h1 class="center-align marg-bot-30">Envoyez nous un message </h1>
    <section class="flex z-depth-2 height-70 width-80 marg-auto marg-bot-30 height-mob-auto width-100-mob flex-c-c no-marg-mob ">

            <form action="#" method="post" enctype="multipart/form-data"  class="flex-col flex-c-c width-50 margin-right-50px margin-left-50px pad-20">
                <div class="flex width-100">
                    <div class="input-field width-100">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="input-field width-100 margin-left-50px no-marg-mob">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom">
                    </div>

                </div>
                <div class="flex width-100">
                    <div class="input-field width-100">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="input-field width-100 margin-left-50px no-marg-mob">
                        <label for="sujet">Sujet</label>
                        <input type="text" id="sujet" name="sujet">
                    </div>
                </div>

                <div class="width-100">
                    <div class="input-field width-100 flex flex-c-c">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="materialize-textarea"></textarea>
                        <button type="submit" class="btn marron-bg rond flex flex-c-c no-pad marg-top-30" name="envoyer"> <i class="material-icons">send</i></button>

                    </div>
                </div>

            </form>
        <div class="marron-bg width-450px height-70 flex-col white-text pad-20 margin-left-50px height-mob-auto width-100-mob no-marg-mob infos">
            <h5 class="center-align-mob">Nos informations</h5>
            <div class="flex-col flex-a-c height-40">
                <div class="flex flex-a-c width-250px">
                    <i class="material-icons ">place</i>
                    <p class="width-150px center-align-mob">28 Place de la Bourse
                    <br>75002, Paris
                    <br>Palais Brongniart
                    </p>
                </div>
                <div class="flex flex-a-c width-250px">
                    <i class="material-icons">phonelink_ring</i>
                    <p class="width-150px center-align-mob">+33 06 76 95 38 43</p>
                </div>
                  <div class="flex flex-a-c width-250px">
                      <i class="material-icons">mail_outline</i>
                      <p class="width-150px center-align-mob"><a href="mailto:amado.diy@gmail.com" class="white-text">amado.diy@gmail.com</a></p>
                  </div>

            </div>
            <div class="flex flex-a-c marg-top-30">
                <p><a href="https://www.instagram.com/amadodiy/?hl=fr"  class="white-text"><img class="logo-soc" src="photos/instagram-logo.png" alt=""></a></p>
                <p><a href="https://www.pinterest.fr/amadodiy/" class="white-text"><img class="logo-soc" src="photos/pinterest-logo.png" alt=""></a></p>
                <p><a href="https://www.facebook.com/ama.do.581730" class="white-text"><img class="logo-soc" src="photos/facebok.png" alt=""></a></p>
            </div>
        </div>

    </section>
</main>


<!-- FIN INCLUDE NAV BARRE-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>


</html>