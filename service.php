<?php
 
require 'functions.php';
 
require './lib/nusoap.php';
 
$server=new nusoap_server();
 
$server->configureWSDL("sql7386611","urn:sql7386611");
 
$server->register(
    "getAllBlocks",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "getBlocksNameAndPictureFromArray",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "getBlocksFromPalette",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "getPaletteWithId",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "getAllPalette",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "getAllTypes",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);

$server->register(
    "uploadPalette",  // Name of function_exists
    array("id"=>"xsd:string"), //inputs
    array("return"=>"xsd:Array") //outputs
);
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
 
//$server->service($HTTP_RAW_POST_DATA);
 
@$server->service(file_get_contents("php://input"));
 
?>
