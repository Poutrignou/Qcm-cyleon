<?php

abstract class Controller {

    private $subFolderView = "";
    protected $basePath = "http://localhost/drone_mvc/public/";
    protected $router;
    
    abstract public function action_default();
    
    public function __construct($routerAlto, $controllerName, $actionName, $params) {
        if(method_exists($this, "action_" . $actionName)) {
            $this->subFolderView = $controllerName . "/";
            $this->router = $routerAlto;
            $action = "action_" . $actionName;
            if(!is_null($params)) {
                $this->$action($params);
            } else {
                $this->$action();
            }
        } else {
            $this->action_default();
        }
    }

    protected function render($vue, $data=[]) {
        $router = $this->router;
        extract($data);
        $fileName = "../app/Views/" . $this->subFolderView . "view_" . $vue . ".php";
        if(file_exists($fileName)) {
            require($fileName);
            require("../app/Utils/layout.php");
        } else {
            $this->action_error("Pas de vue");
        }
    }

    protected function action_error($message) {
        $this->subFolderView= "";
        $data = ['error'=>$message];
        $this->render('error', $data);
        die();
    }
    
    protected function validateData($data, $type="") {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($type === 'email') {
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        }
        return $data;
    }
}