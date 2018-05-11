<?php

require 'visual.php';

$app = new \atk4\ui\App('Library');

$client=new Client($db);
$client->load($_GET['id']);
$borrow= $client->ref('Borrow');
$borrow->setOrder('name');
$grid = $app->add('Grid');
$grid->setModel($borrow);
