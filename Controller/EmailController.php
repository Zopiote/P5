<?php

	class EmailController extends BaseController {

        /* Evoie Email de contact */

        public function EmailContact() {

            if(isset($_POST['submit'])){
                try {
                    $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
                      ->setUsername('corblin.aurelien69@gmail.com')
                      ->setPassword('Fryfry69')
                    ;
                 
                    $mailer = new Swift_Mailer($transport);
                 
                    $message = (new Swift_Message('Contact'))
                      ->setFrom(['corblin.aurelien69@gmail.com' => $_POST['prenom']])
                      ->setReplyTo([$_POST['email']])
                      ->setTo(['corblin.aurelien69@gmail.com'])
                      ->setBody($_POST['nom'].' '.$_POST['prenom'].' vous écrit:<br><br>'.$_POST['message'].'<br><br> Vous pouvez lui répondre à cette adresse email: '.$_POST['email'])
                      ->setContentType('text/html')
                    ;
                 
                    $mailer->send($message);
                 
                    echo "<div class='alert alert-success'>Le mail à bien été envoyer, vous serez contacter dans les plus bref délais.</div>";
                } catch(Exception $e) {
                    echo "<div class='alert alert-danger'>".$e->getMessage()."</div>";
                }
            }
            
            header("Location: /");
        }

    }