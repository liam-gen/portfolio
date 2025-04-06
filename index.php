<?php

ini_set("display_errors", 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liam Charpentier - Développeur fullstack sites web & apps</title>

    <link rel="shortcut icon" href="https://liamcharpentier.fr/logo.ico" type="image/x-icon">

    <!-- SEO -->

    <meta name="title" content="Liam Charpentier - Développeur fullstack sites web et apps proche de Rennes et Laval">
    <meta name="description" content="Portfolio de Liam Charpentier, développeur fullstack sites webs et d'applications. Créez votre site dès maintenant.">
    <meta name="keywords" content="liam charpentier, liam, charpentier, lyam, liam site, liamgenjs, liamgen.js, lgjs, creation site, site rennes, site laval, liam dev, liam développeur, site web vitré, site web châtillon en vendelais, dev châtillon en vendelais, site web bretagne, informatique rennes, informatique laval, informatique vitré, vitré, rennes, laval, châtillon en vendelais">
    <meta name="robots" content="index, follow">
    <meta name="language" content="French">
    <meta name='url' content='https://liamcharpentier.fr'>
    <meta name='copyright' content='Liam Charpentier'>

    <meta name='og:title' content='Liam Charpentier - Développeur fullstack sites web et apps proche de Rennes et Laval'>
    <meta name='og:type' content='website'>
    <meta name='og:url' content='https://liamcharpentier.fr'>
    <meta name='og:site_name' content='Liam Charpentier - Développeur fullstack sites web et apps proche de Rennes et Laval'>
    <meta name='og:description' content="Portfolio de Liam Charpentier, développeur fullstack sites webs et d'applications. Créez votre site dès maintenant.">

    <link rel="canonial" href="https://liamcharpentier.fr">

    <link rel="stylesheet" href="https://liamcharpentier.fr/style.css?v=0.0.2">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tingle/0.8.4/tingle.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tingle/0.8.4/tingle.min.css"  />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/@hawk.so/javascript@latest/dist/hawk.min.js" async onload="const hawk = new HawkCatcher({token: 'eyJpbnRlZ3JhdGlvbklkIjoiMWU3YTA5YzQtYzNlNi00Y2QzLWJiNWUtOWU2NGI5MzYwZDEyIiwic2VjcmV0IjoiODRmODFkMTktYzA3MC00ZmU3LTkwNDEtZjI0MDUxYjNkMDMyIn0='});"></script>
    

</head>
<body>
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DCE1WCMYBT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-DCE1WCMYBT');
    </script>

    <?php
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$_ENV["CAPTCHA_SECRET"].'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
    
            if($responseData->success)
            {
                if(
                    isset($_POST["name"]) && !empty($_POST["name"]) &&
                    isset($_POST["email"]) && !empty($_POST["email"]) &&
                    isset($_POST["objet"]) && !empty($_POST["objet"]) &&
                    isset($_POST["message"]) && !empty($_POST["message"])
                )
                {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $objet = $_POST["objet"];
                    $msg = $_POST["message"];
    
                    $message = "<html><body>";
                    $message.= "<h2>Nouveau message depuis le site web</h2>";
                    $message.= "<p><strong>Nom:</strong> $name</p>";
                    $message.= "<p><strong>Email:</strong> $email</p>";
                    $message.= "<p><strong>Objet:</strong> $objet</p>";
                    $message.= "<p><strong>Message:</strong> $msg</p>";
                    $message.= "</body></html>";
    
                    $mail = new PHPMailer(true);
    
                    try {
                        $mail->isSMTP();
                        $mail->Host = $_ENV["EMAIL_HOST"];
                        $mail->SMTPAuth = true;
                        $mail->Username = $_ENV["EMAIL_USER"];
                        $mail->Password = $_ENV["EMAIL_PASSWORD"];
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = $_ENV["EMAIL_PORT"];
    
                        // Expéditeur et destinataire
                        $mail->setFrom('webmaster@liamcharpentier.fr', 'Message automatique');
                        $mail->addAddress('contact@liamcharpentier.fr');
    
                        // Contenu de l'email
                        $mail->isHTML(true);
                        $mail->Subject = 'Nouveau message depuis le site web';
                        $mail->Body    = $message;
    
                        $mail->send();
                        echo '<script>Swal.fire({title: "Message envoyé !",icon: "success",draggable: true});</script>';
                    } catch (Exception $e) {
                        echo '<script>Swal.fire({title: "Une erreur s\'est produite : '.$mail->ErrorInfo.'",icon: "error",draggable: true});</script>';
                    }
                }
            }
    }
  ?>




    <header>
        <h4>Liam Charpentier</h4>
        <nav>
            <ul>
                <li>
                    <a href="/">Accueil</a>
                </li>
                <li>
                    <a href="#skills">Compétences</a>
                </li>
                <li>
                    <a href="#services">Services</a>
                </li>
                <li>
                    <a href="#projects">Projets</a>
                </li>
                <li>
                    <a style="cursor: not-allowed">Mon CV</a>
                </li>
                <li>
                    <a href="https://status.liamcharpentier.fr" target="_blank">Status <i class='bx bx-link-external' ></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="main_header">
            <h1>Liam Charpentier</h1>
            <h2>Développeur <span class="accent">full-stack</span> proche de <span class="accent">Rennes</span> et <span class="accent">Laval</span>.</h2>
        </section>

        <section id="skills">
            <h4>Mes compétences</h4>
            <div class="container">
                <div>
                    <h5>Langages</h5>
                    <div class="subcontainer">
                        <div>
                            <h6>PHP</h6>
                            <i class='bx bxl-php'></i>
                            <span class="level">Avancé</span>
                        </div>
                        <div>
                            <h6>Node.js</h6>
                            <i class='bx bxl-nodejs'></i>
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>JavaScript</h6>
                            <i class='bx bxl-javascript'></i>
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>HTML</h6>
                            <i class='bx bxl-html5'></i>
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>CSS</h6>
                            <i class='bx bxl-css3'></i>
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>SQL</h6>
                            <i class='bx bxs-data'></i>
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>Python</h6>
                            <i class='bx bxl-python'></i>
                            <span class="level">Bases</span>
                        </div>
                        <div>
                            <h6>C++</h6>
                            <i class='bx bxl-c-plus-plus'></i>
                            <span class="level">Bases</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h5>Frameworks / Librairies</h5>
                    <div class="subcontainer">
                        <div>
                            <h6>Socket.io</h6>
                            <img src="./assets/icons/socketio.svg" alt="Socket.io">
                            <span class="level">Bases</span>
                        </div>
                        <div>
                            <h6>Express.js</h6>
                            <img src="./assets/icons/expressjs.svg" alt="Express.js">
                            <span class="level">Bases</span>
                        </div>
                        <div>
                            <h6>Electron.js</h6>
                            <img src="./assets/icons/electronjs.svg" alt="Electron.js">
                            <span class="level">Intermédiaire</span>
                        </div>
                        <div>
                            <h6>Cordova</h6>
                            <img src="./assets/icons/cordova.svg" alt="Cordova">
                            <span class="level">Bases</span>
                        </div>
                        <div>
                            <h6>TailwindCSS</h6>
                            <img src="./assets/icons/tailwindcss.svg" alt="TailwindCSS">
                            <span class="level">Bases</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h5>Outils</h5>
                    <div class="subcontainer">
                        <div><h6>Figma</h6></div>
                        <div><h6>OVH Cloud</h6></div>
                        <div><h6>phpMyAdmin</h6></div>
                        <div><h6>MariaDB</h6></div>
                        <div><h6>MongoDB</h6></div>
                        <div><h6>WinSCP</h6></div>
                        <div><h6>PuttY</h6></div>
                        <div><h6>Docker</h6></div>
                        <div><h6>Nginx</h6></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <h4>Mes services</h4>
            <div class="container">
                <div>
                    <p>Création de site internet</p>
                    <button data-service="create-website">
                        <span>Demander un devis</span>
                    </button>
                </div>
                <div>
                    <p>Refonte de site internet</p>
                    <button data-service="edit-website">
                        <span>Demander un devis</span>
                    </button>
                </div>
                <div>
                    <p>Création d'application pour Windows/Linux</p>
                    <button data-service="desktop-app">
                        <span>Demander un devis</span>
                    </button>
                </div>
                <div>
                    <p>Création d'une application mobile</p>
                    <button data-service="mobile-app">
                        <span>Demander un devis</span>
                    </button>
                </div>
                <div>
                    <p>Création d'une extension pour navigateur</p>
                    <button data-service="browser-ext">
                        <span>Demander un devis</span>
                    </button>
                </div>
            </div>
        </section>

        <section id="projects">
            <h4>Mes projets</h4>

            <div class="container">
                <div>
                    <img src="./assets/images/projects/levendelaiscinema.fr.png" alt="levendelaiscinema.fr">
                    <h3>Cinéma Le Vendelais</h3>
                    <button class="open-project cta" project-id="levendelaiscinema.fr">
                        <span>Plus d'informations</span>
                        <svg width="15px" height="10px" viewBox="0 0 13 10">
                          <path d="M1,5 L11,5"></path>
                          <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </div>

                <div>
                    <img src="./assets/images/projects/yvandespizz.fr.png" alt="yvandespizz.fr">
                    <h3>Yvan Des Pizz</h3>
                    <button class="open-project cta" project-id="yvandespizz.fr">
                        <span>Plus d'informations</span>
                        <svg width="15px" height="10px" viewBox="0 0 13 10">
                          <path d="M1,5 L11,5"></path>
                          <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <section class="contact">
            <form action="" method="POST">
                <h2>Formulaire de contact</h2>

                <label for="name">Nom & prénom</label>
                <input type="text" name="name" placeholder="Rick Astley" required>

                <label for="email">Adresse email</label>
                <input type="email" name="email" placeholder="dark.vador@starwars.fr" required>

                <label for="objet">Objet</label>
                <input type="text" name="objet" placeholder="Demande..." required>

                <label for="message">Message</label>
                <textarea name="message" placeholder="Message..." required></textarea>

                <div class="g-recaptcha" data-sitekey="<?= $_ENV["CAPTCHA_KEY"] ?>"></div>

                <input type="submit" value="Envoyer">
            </form>
        </section>

        <section class="contact">
            <h3>Vous pouvez aussi me contacter via l'adresse email contact@liamcharpentier.fr</h3>
        </section>
    </main>
    <footer>Made with <i class='bx bxs-heart' style="color:red" ></i> by Liam Charpentier&nbsp;&nbsp;<a href="https://github.com/liam-gen" target="_blank"><i class='bx-sm bx bxl-github' ></i></a></footer>
    <script src="https://liamcharpentier.fr/script.js"></script>
</body>
</html>