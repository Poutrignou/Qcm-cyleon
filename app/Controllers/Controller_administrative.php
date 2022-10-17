<?php

class Controller_administrative extends Controller
{
	
	public function action_default() {
		echo("La methode n'existe pas");
	}

	public function action_404() {
		$this->render("404");
	}

	public function action_home() {
		if(!isset($_SESSION['userId'])) {
			header("Location: " . $this->router->generate('logginConnection'));
		} else {
			header("Location: " . $this->router->generate('appliDisplay'));
		}
	}

	public function action_profil() {
		if(!isset($_SESSION['userId'])) {
			header("Location: " . $this->router->generate('logginConnection'));
		} else {
			$this->render("profil");
		}
	}

}