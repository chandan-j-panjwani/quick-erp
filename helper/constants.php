<?php

define('BASEURL', $di->get('config')->get('base_url'));
define('BASEASSETS', BASEURL . "assets/");
define('BASEPAGES', BASEURL . "views/pages/");

define("ADD_SUCCESS", "add success");
define("ADD_ERROR", "add error");
define("VALIDATION_ERROR", "validation error");

define("UPDATE_SUCCESS", "update success");
define("UPDATE_ERROR", "update error");

define("DELETE_SUCCESS", "delete success");
define("DELETE_ERROR", "delete error");
