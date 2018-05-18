<?php

$app->initLayout('Admin');

if(isset($_SESSION['status'])){
    if($_SESSION['status']=='student'){
    $app->layout->leftMenu->addItem(['Main Menu','icon'=>'book'],['main']);
    $app->layout->leftMenu->addItem(['Book','icon'=>'book'],['']);
    $app->layout->leftMenu->addItem(['Rented Books','icon'=>'cloud'],['']);

    }elseif($_SESSION['status']=='admin'){
      $app->layout->leftMenu->addItem(['Main Menu','icon'=>'book'],['']);
      $app->layout->leftMenu->addItem(['Books','icon'=>'book'],['']);
      $app->layout->leftMenu->addItem(['Rented Books','icon'=>'cloud'],['']);
      $app->layout->leftMenu->addItem(['Clients','icon'=>'book'],['client']);
      $app->layout->leftMenu->addItem(['Librarians','icon'=>'cloud'],['']);
      $app->layout->leftMenu->addItem(['Quit','icon'=>'quit'],['']);
  }else{
    header('Location: index.php');
}}else{
  header('Location: index.php');
}
