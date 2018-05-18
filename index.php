<?php
require 'vendor/autoload.php';
require 'connecting.php';

$app = new \atk4\ui\App('Library');
$app->initLayout('Centered');

$someone = new Librarian($db);
$form = $app->layout->add('Form');
$form->setModel(new Librarian($db));
$form->buttonSave->set('Вход');
$form->onSubmit(function($form) use ($someone) {

  $someone = $form->model->tryLoadBy('name',$form->model['name']);
  $someone->tryLoadBy('name',$form->model['name']);
  if ($someone['surname'] == $form->model['surname']){
    if ($someone['password'] == $form->model['password']) {
      $_SESSION['user_id'] = $someone->id;
      $_SESSION['status'] = 'student';
      return new \atk4\ui\jsExpression('document.location="main.php"');
    } else {
      $someone->unload();
      $er = (new \atk4\ui\jsNotify('No such user.'));
      $er->setColor('red');
      return $er;
    }
  } else {
    $someone->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
    return $er;
  }
});
