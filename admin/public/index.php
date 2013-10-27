<?php
chdir('..');
//require'vendor/autoload.php';
include '../vendor/autoload.php';
include 'lib/Admin.php';
$api = new Admin('admin_agiletoolkit_org');
$api->main();
