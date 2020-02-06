<?php

require_once 'config/constants.php';

session_start();

spl_autoload_register( function ($className){
    include 'libraries/'. $className. '.php';
});

