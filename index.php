<?php

require 'config.php';
require 'classes/Bootstrap.php';

//creating new bootstrap with a url (get)
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();