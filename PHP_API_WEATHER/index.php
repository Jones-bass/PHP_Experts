<?php

require_once 'inc/config.php';
require_once 'inc/api.php';

$city = 'Lisbon';

$days = 5;

$results = Api::get($city, $days);

echo '<pre>';
print_r($results);
