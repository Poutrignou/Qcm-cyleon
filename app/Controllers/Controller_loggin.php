<?php

class Controller_loggin extends Controller
{
	
	public function action_default() {
		echo("La methode n'existe pas");
	}

	/**
	 * Connection form display
	 */
    public function action_connection($params = NULL) {
		if(!isset($_SESSION['userId'])) {
			$message = "";
			// Récupération en GET des erreurs OU notification
			if(isset($params['notification'])) {
				$notification = $this->validateData($params['notification']);
				switch($notification) {
					case 1:
						$message = '<p class="form__error">Le formulaire n\'a pas été complété correctement.</p>';
						break;
					case 2:
						$message = '<p class="form__error">L\'adresse mail ou le mot de passe n\'est pas correcte.</p>';
						break;
					case 3:
						$message = '<p class="form__error">Un nouveau mot de passe vous a été envoyé.</p>';
						break;
				}
			}
			$data['message'] = $message;
			$this->render("connection", $data);
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**
	 * Inscription form display
	 */
	public function action_inscription($params = NULL) {
		if(!isset($_SESSION['userId'])) {
			$message = "";
			// Récupération en GET des erreurs OU notification
			if(isset($params['notification'])) {
				$notification = $this->validateData($params['notification']);
				switch($notification) {
					case 1:
						$message = '<p class="form__error">Le formulaire n\'a pas été complété correctement.</p>';
						break;
					case 2:
						$message = '<p class="form__error">Veuillez entrer un mot de passe avec au minimum une lettre, un chiffre et 6 caractères, ainsi qu\'une adresse email valide.</p>';
						break;
					case 3:
						$message = '<p class="form__error">Cette adresse mail est déjà utilisée.</p>';
						break;
					case 4:
						$message = '<p class="form__error">Les mots de passe ne sont pas identiques.</p>';
						break;				
				}
			}
			$data['message'] = $message;
			$this->render("inscription", $data);
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**
	 * Forgiven password form display
	 */
	public function action_forgivenPassword($params = NULL) {
		if(!isset($_SESSION['userId'])) {
			$message = "";
			// Récupération en GET des erreurs OU notification
			if(isset($params['notification'])) {
				$notification = $this->validateData($params['notification']);
				switch($notification) {
					case 1:
						$message = '<p class="form__error">Le formulaire n\'a pas été complété correctement.</p>';
						break;
				}
			}
			$data['message'] = $message;
			$this->render("forgivenPassword", $data);
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**
	 * Connection treatment
	 */
	public function action_connectionTreatment() {
		if(!isset($_SESSION['userId'])) {
			if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
				$email = $this->validateData($_POST['email'], 'email');
				$password = $this->validateData($_POST['password']);
				$m=Model_loggin::getModel();
				$userIds = $m->getUserIdsFromEmail($email);
				if($userIds && password_verify($password, $userIds->password)) {
					$_SESSION['userId'] = $userIds->id_user;
					$m->deletePassedProducts($userIds->id_user);
					header("Location: " . $this->router->generate('appliDisplay'));
				} else {
					header("Location: " . $this->router->generate('logginConnection', ['notification' => 2]));
				}
			} else {
				header("Location: " . $this->router->generate('logginConnection', ['notification' => 1]));
			}
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**
	 * Inscription treatment
	 */
	public function action_inscriptionTreatment() {
		if(!isset($_SESSION['userId'])) {
			if(isset($_POST['email'], $_POST['password'], $_POST['password-confirmation'], $_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirmation']) && !empty($_POST['name'])) {
				$email = $this->validateData($_POST['email'], "email");
				$password = $this->validateData($_POST['password']);
				$passwordConfirmation = $this->validateData($_POST['password-confirmation']);
				$name = $this->validateData($_POST['name']);
				if(preg_match('@[a-zA-Z]@', $password) && preg_match('@[0-9]@', $password) && strlen($password) >= 6 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$m=Model_loggin::getModel();
					$userMail = $m->getEmailFromEmail($email);
					if(!$userMail) {
						if($password === $passwordConfirmation) {
							$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
							$m->insertUser($email, $hashedPassword, $name);
							$this->sendInscriptionEmail($email);
							$userId = $m->getIdFromEmail($email);
							$_SESSION['userId'] = $userId->id_user;
							header("Location: " . $this->router->generate('appliDisplay'));
						} else {
							header("Location: " . $this->router->generate('logginInscription', ['notification' => 4]));
						}
					} else {
						header("Location: " . $this->router->generate('logginInscription', ['notification' => 3]));
					}
				} else {
					header("Location: " . $this->router->generate('logginInscription', ['notification' => 2]));
				}
			} else {
				header("Location: " . $this->router->generate('logginInscription', ['notification' => 1]));
			}
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**	
	 * Forgiven password treatment
	 */
	public function action_forgivenPasswordTreatment() {
		if(!isset($_SESSION['userId'])) {
			if(isset($_POST['email']) && !empty($_POST['email'])) {
				$email = $this->validateData($_POST['email'], 'email');
				$m=Model_loggin::getModel();
				$userMail = $m->getEmailFromEmail($email);
				if($userMail) {
					$newPassword = $this->generatePassword();
					$hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
					$m->updatePassword($email, $hashedNewPassword);
					$this->sendRecoverPasswordEmail($email, $hashedNewPassword);
				}
				header("Location: " . $this->router->generate('logginConnection', ['notification' => 3]));
			} else {
				header("Location: " . $this->router->generate('logginForgivenPassword', ['notification' => 1]));
			}
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
    }

	/**
	 * Generate the new password from forgiven password treatment
	 */
	private function generatePassword() {
		$newPassword = "";
		$characterUp = ["A","Z","E","R","T","Y","U","O","P","Q","S","D","F","G","H","J","k","L","M","W","X","C","V","B","N"];
		$characterLow = ["a","z","e","r","t","y","u","i","o","p","q","s","d","f","g","h","j","k","m","w","x","c","v","b","n"];
		$number = ["0","1","2","3","4","5","6","7","8","9"];
		for($j=0; $j<2; $j++) {
			$randomNumber = random_int(0, count($characterUp)-1);
			$newPassword .= $characterUp[$randomNumber];
			for ($i=0; $i<3; $i++) {
				$randomNumber = random_int(0, count($characterLow)-1);
				$newPassword .= $characterLow[$randomNumber];
			}
			$randomNumber = random_int(0, count($number)-1);
			$newPassword .= $number[$randomNumber];
		}
		return $newPassword;
	}

	public function action_modifyPassword($params = NULL) {
		if(isset($_SESSION['userId'])){
			$message = "";
            if(isset($params['notification'])) {
                $notification = $this->validateData($params['notification']);
                switch($notification) {
                    case 1:
                        $message = '<p class="form__error">Le formulaire n\'a pas été complété correctement.</p>';
                        break;
                    case 2:
                        $message = '<p class="form__error">Veuillez entrer un mot de passe avec au minimum une lettre, un chiffre, et 6 caractères.</p>';
                        break;
                    case 3:
                        $message = '<p class="form__error">Les nouveaux mots de passe ne sont pas identiques.</p>';
                        break;
                    case 4:
                        $message = '<p class="form__error">L\'ancien mot de passe n\'est pas correct.</p>';
                        break;
                }
            }
            $data['message'] = $message;
			$this->render("modifyPassword", $data);
		} else {
			header("Location: " . $this->router->generate('logginConnection'));
		}
	}

	/**
     * Password modify treatment
     */
    public function action_modifyPasswordTreatment() {
        if(isset($_SESSION['userId'])) {
            if(isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['newPasswordConf']) && !empty($_POST['currentPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newPasswordConf'])) {
                $currentPassword = $this->validateData($_POST['currentPassword']);
                $newPassword = $this->validateData($_POST['newPassword']);
                $newPasswordConf = $this->validateData($_POST['newPasswordConf']);
                if(preg_match('@[a-zA-Z]@', $newPassword) && preg_match('@[0-9]@', $newPassword) && strlen($newPassword) >= 6) {
                    if($newPassword === $newPasswordConf) {
                        $userId = $this->validateData($_SESSION['userId']);
                        $m=Model_loggin::getModel();
                        $userPassword = $m->getPasswordFromId($userId);
                        if(password_verify($currentPassword, $userPassword->password)) {
                            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                            $m->updatePasswordFromId($userId, $hashedNewPassword);
                            header("Location: " . $this->router->generate('administrativeProfil'));
                        } else {
                            header("Location: " . $this->router->generate('logginModifyPassword', ['notification' => 4]));
                        }
                    } else {
                        header("Location: " . $this->router->generate('logginModifyPassword', ['notification' => 3]));
                    }
                } else {
                    header("Location: " . $this->router->generate('logginModifyPassword', ['notification' => 2]));
                }
            } else {
                header("Location: " . $this->router->generate('logginModifyPassword', ['notification' => 1]));
            }
        } else {
            header("Location: " . $this->router->generate('administrativeHome'));
        }
    }

	public function action_loginDeco() {
		if(isset($_SESSION['userId'])){
			session_destroy();
		}
		header("Location: " . $this->router->generate('logginConnection'));
	}


	/**
	 * Send an email to the user in his address after inscription
	 */
	private function sendInscriptionEmail($email) {
		$email = $this->validateData($email, 'email');
		mail($email, 'Bienvenue sur No Wayste', 'Bonjour,
    
Merci pour votre inscription.

A bientôt,

L\'équipe No Wayste');
	}

	/**
	 * Send an email to the user in his address after asked a new password from forgiven password page
	 */
	private function sendRecoverPasswordEmail($email, $newPassword) {
		$email = $this->validateData($email, 'email');
		mail($email, 'Mot de passe oublié - No Wayste', 'Bonjour,

Veuillez trouver ci-dessous votre nouveau mot de passe vous permettant de vous connecter à la plateforme Prepa Drone.
Nous vous conseillons de modifier ce mot de passe.

'. $newPassword .'

A bientôt

L\'équipe Prepa Drone');
	}
}