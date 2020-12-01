<?php

require __DIR__ . '/../vendor/autoload.php';

// Config Database
define('DB_DSN', 'mysql:dbname=mechanic;host=localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'macaco123');

// Config TimeZone
date_default_timezone_set('Europe/Lisbon');
