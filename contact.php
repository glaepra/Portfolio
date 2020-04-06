<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Contact.css">
    <title>Contact</title>
</head>
<style>
    /**************************************************/
    /**************interface smartiphone***************/
    /**************************************************/
    @media screen and (max-width : 680px ){
        .block_contact {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 40px 1fr 1fr;
        border-radius: 10px;
        box-shadow: 0 0 25px #00224b;
        margin: 20px;
        padding: 30px;
        align-items: center;
    }
    /** interface pc **/
    }
    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        background: linear-gradient(#02387ad8, rgba(2, 56, 122));
        background-size: contain;
        background-repeat: no-repeat;
        display: grid;
        grid-template-rows: 100vh;
    }

    .block_contact {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 40px;
        background: #0F3B7C;
        border-radius: 10px;
        box-shadow: 0 0 25px #00224b;
        margin: 20px;
        padding: 30px;
        align-items: center;
    }

    .item {
        grid-row-start: 2;
    }

    .item-1 {
        grid-row-start: 2;
        justify-self: center;
        text-align: center;
    }

    .flex {
        display: flex;
    }

    .space {
        justify-content: start;
    }

    textarea {
        width: 95% !important;
        height: 200%;
        font-size: 120%;
    }

    form {
        width: 100%;
    }

    label,
    input {
        font-size: 120%;
    }

    input {
        width: 95% !important;
        border-radius: 5px;
    }

    #textarea {
        height: 120%;
    }

</style>

<body>
    <div class="block_contact">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" viewBox="0 0 24 24" fill="none" stroke="#02387ad8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" /></svg>
        </a>
        <div class="item-1">
            <h1>Contact</h1>
            <img src="img/contact.svg" alt="img_contact" width="50%">
            <p style="font-size: 180%;">Mes reseaux : </p>
            <div class="flex space">
                <a href="https://twitter.com/victor_drnd"><img src="img/icones/twitter.png" alt="img_twitter" width="70%"></a>
                <a href="https://www.instagram.com/victor_drnd/"><img src="img/icones/instagram.png" alt="img_instagram" width="70%"></a>
                <a href="https://www.linkedin.com/in/victor-dorand-15035b1a3/"><img src="img/icones/linkedin.png" alt="img_linkedin" width="70%"></a>
            </div>
        </div>
        <form action="contact.php" method="post" class="item">
            <h1>Me contacter :</h1>
            <label for="name">Nom:</label><br>
            <input type="text" name="nom" id="name" required placeholder="Nom" value="<?php if (isset($_POST['nom'])) {
                                                                                            echo $_POST['nom'];
                                                                                        } ?>" /><br>
            <label for="name">Prénom</label><br>
            <input type="text" name="prenom" id="prenom" required placeholder="Prénom" value="<?php if (isset($_POST['prenom'])) {
                                                                                                    echo $_POST['prenom'];
                                                                                                } ?>" /><br>
            <label for="name">Objet Du Message:</label><br>
            <input type="text" name="object" id="subject" required placeholder="Sujet" value="<?php if (isset($_POST['object'])) {
                                                                                                    echo $_POST['object'];
                                                                                                } ?>" /><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required placeholder="email@exemple.com" value="<?php if (isset($_POST['email'])) {
                                                                                                            echo $_POST['email'];
                                                                                                        } ?>" /><br>
            <div id="textarea">
                <label for="message">Message:</label><br>
                <textarea rows="7" name="message" id="message" required value="<?php if (isset($_POST['message'])) {
                                                                                    echo $_POST['message'];
                                                                                } ?>"></textarea><br>
            </div>
            <input type="submit" value="Envoyer Mon Message" name="envoyer" />
    </div>
    </div>
</body>
<?php
if (isset($_POST['envoyer']) && !empty('nom') && !empty('object') && !empty('email') && !empty('message')) {
    //variable 
    $nom = $_POST['nom'];
    $object = $_POST['object'];
    $mail = $_POST['email'];
    $message = $_POST['message'];

    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"victordorand.fr"<' . $mail . '>' . "\n";
    $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    mail("dorandvictor@gmail.com", $object, $message, $header);
} else {
    $msg = "tout les chanps doivent etre completer";
}
?>