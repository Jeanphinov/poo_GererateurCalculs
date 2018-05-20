<?php
function autoloader($classe){
    require ('src/'.$classe.'.php');

}
spl_autoload_register("autoloader");
