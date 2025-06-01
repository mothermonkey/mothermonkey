		<?php
				$nom = strip_tags($_POST['nom']);
				$telephone = strip_tags($_POST['telephone']);
				$mail = strip_tags($_POST['mail']);
				$message = strip_tags($_POST['message']);
				$checkRobot = strip_tags($_POST['checkRobot']);
				$newsletter = strip_tags($_POST['newsletter']);

				// text to send
				$texte = "Hi there,<br /><br />";
				$texte = $texte . "Message from Mother Monkey.<br />";
				$texte = $texte . "The elements entered in the form are as follows :<br />";
				$texte = $texte . "Name : $nom<br />";
				$texte = $texte . "Phone number : $telephone<br />";
				$texte = $texte . "Email :  $mail<br /><br />";
				$texte = $texte . "Message : $message<br /><br />";
				$texte = $texte . "Thanks for messaging us, we'll respond as soon as possible!<br /><br />";
				$texte = $texte . "This is an automatic message, do not reply to it.";

				$texte = stripslashes($texte);

				// Recipient and subject of the message
				$destinataire = "mothermonkeyrock@gmail.com"; // input your email here
				$objet = "Message from the Mother Monkey Website"; // input your domain name here

				// Headers
	      $headers = array(
	                      'Content-type' => 'text/html',
	                      'From' => 'mothermonkeyrock@gmail.com', // input your email from here
	                      'X-Mailer' => 'PHP/' . phpversion()
	                  );

				// Send the message then return data to current page with ajax
				if ($checkRobot == 7) {
					$conf = ini_set('mail', 'mail.gmail.com'); // update your information here
					$sending_ok = mail($destinataire, $objet, $texte, $headers);
					if ($sending_ok) {
							echo "<p class=\"hardLight\">Thanks for your message !<br /><br />We will get back to you very soon.</p>";
						}
					else {
							echo "<p class=\"hardLight\">There seems to be a problem ...</p>";
						}

				} else {
					echo "<p class=\"hardLight\">There seems to be a problem with the anti robot control ...</p>";
				}
