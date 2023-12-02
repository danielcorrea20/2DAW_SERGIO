<?php
function controllers_autoload($class){
    require_once 'Controller/'. $class . '.php';


}
spl_autoload_register('controllers_autoload');


?>