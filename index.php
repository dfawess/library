<?php
require 'vendor/autoload.php';
require 'connecting.php';

$app = new \atk4\ui\App('Library');
$app->initLayout('Centered');

$crud = $app->layout->add('CRUD');
$crud->setModel(new Book($db));

$crud = $app->layout->add('CRUD');
$crud->setModel(new Client($db));

$crud = $app->layout->add('CRUD');
$crud->setModel(new Librarian($db));

$crud = $app->layout->add('CRUD');
$crud->setModel(new Borrow($db));
