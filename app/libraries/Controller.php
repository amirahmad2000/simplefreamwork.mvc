<?php 
 //basic controller

 class Controller{
    //load model
    public function model($model){
        require_once'../app/models/' . $model .'.php' ;

        return new $model;
    }

    public function view($view,$data = []){

        if(file_exists('../app/views/'. $view . '.php')){
            //load view file
            require_once'../app/views/'. $view . '.php';
        }else{
            die('View does not exist');
        }

    }


 }