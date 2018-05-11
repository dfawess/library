<?php

require 'connecting.php';

$app = new \atk4\ui\App('Client');

require 'visual.php';

$crud = $app->layout->add('GRID');
$crud->setModel(new Book($db));
