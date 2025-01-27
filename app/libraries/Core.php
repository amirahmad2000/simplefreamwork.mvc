<?php

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url=$this->getUrl();

        //Lock in controllers for first value

        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //if exist set as controller
            $this->currentController = ucwords($url[0]);

            unset($url[0]);
        }
        require_once'../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        //check for second part of url
        if(isset($url[1])){
            //check ot see if method exist in controller
            if(method_exists($this->currentController,$url[1])){
                
                $this->currentController = $url[1];

                unset($url[1]);
            }
        }

        //get param
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}