<?php

require 'connecting.php';


$app = new \atk4\ui\App('Clients');

require 'visual.php';

$crud = $app->layout->add('CRUD');
$crud->setModel(new Client($db));
$crud->addQuickSearch(['surname']);
