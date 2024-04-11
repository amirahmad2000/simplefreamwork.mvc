<?php 

require_once'config/config.php';

// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';


function myfreamwork($classname){
    require_once 'libraries/'.$classname.'.php';
}

spl_autoload_register('myfreamwork');