<?php


class Core
{
    protected $currentController = "Pages";
    protected $currentMethod = 'index';
    protected $params = [];
    public function __construct(){
        $url = $this -> getURL();
        if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        if (isset($url[2])){
            $this->params=array_values($url);
            unset($url);
        }

        call_user_func_array(array($this->currentController, $this->currentMethod),$this->params);
    }
    public function getURL(){
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}