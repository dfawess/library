<?php

require 'connecting.php';

$app = new \atk4\ui\App('Clients');
$app->initLayout('Admin');

$crud = $app->layout->add('Form');
$crud->setModel(new Borrow($db));


$crud->onSubmit(function($crud) {
  $crud->model->save();
  return $crud->success('Record updated');

});
