<?php

require_once '../app/init.php';

if ( !session_id()){
    session_start();
}


$app = new App();