<?php
require 'vendor/autoload.php';
$obj = new \houdunwang\config\Config();
$obj->set( 'name', '后盾向军' );
print_r( $obj->all() );