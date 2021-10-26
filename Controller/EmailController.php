<?php

	class EmailController extends BaseController {

        /* Evoie Email de contact */

        public function EmailContact() {

            if(isset($_POST['submit'])){
                try {
                    $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
                      ->setUsername($_ENV['emailUser'])
                      ->setPassword($_ENV['emailPassword'])
                    ;
                 
                    $mailer = new Swift_Mailer($transport);
                 
                    $message = (new Swift_Message('Contact'))
                      ->setFrom([$_ENV['emailUser'] => $_POST['prenom']])
                      ->setReplyTo([$_POST['email']])
                      ->setTo([$_ENV['emailUser']])
                      ->setBody($_POST['nom'].' '.$_POST['prenom'].' vous écrit:<br><br>'.$_POST['message'].'<br><br> Vous pouvez lui répondre à cette adresse email: '.$_POST['email'])
                      ->setContentType('text/html')
                    ;
                 
                    $mailer->send($message);
                 
                    $_SESSION['message'] = "<div class='alert alert-success'>Le mail à bien été envoyer, vous serez contacter dans les plus bref délais.</div>";
                } catch(Exception $e) {
                    $_SESSION['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
                }
            }
            
            header("Location: /");
        }

    }