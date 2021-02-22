<?php
ini_set('display_errors', 'On');//Agar maine php.ini mei changes kiya toh sab projects mei change karega. Mujhe sirf isi project mei changes krna hai toh I will use this method.
error_reporting(E_ALL); //mujhe saare errors batane mangta hai toh for that i will use this.
session_start();

require_once __DIR__ . "/requirements.php";

$di = new DependencyInjector();
$di->set('config', new Config());
$di->set('database', new Database($di));
$di->set('hash', new Hash());
$di->set('util', new Util($di));
$di->set('error_handler', new ErrorHandler());
$di->set('validator', new Validator($di));

$di->set('category', new Category($di));
$di->set('customer', new Customer($di));
$di->set('supplier', new Supplier($di));
$di->set('product', new Product($di));
 
require_once __DIR__ . "/constants.php";