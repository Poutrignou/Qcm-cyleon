<?php

class Controller_appli extends Controller
{
	
public function action_default() {
	echo("La methode n'existe pas");
}

public function action_display() {

		header("Location: " . $this->router->generate('logginConnection'));
	}
}


