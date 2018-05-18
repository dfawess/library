<?php
require 'vendor/autoload.php';

session_start();
$db = new \atk4\data\Persistence_SQL('mysql:127.0.0.1;dbname=library;charset=utf8', 'root', '');


class Client extends \atk4\data\Model {
  public $table = 'client';
  function init() {
    parent::init();
    $this->addField('name');
    $this->addField('surname');
    $this->addField('password',['type'=>'password']);
    $this->hasMany('Borrow', new Borrow);
  }
}


class Book extends \atk4\data\Model {
  public $table = 'book';
  function init() {
    parent::init();
    $this->addField('author');
    $this->addField('name');
    $this->addField('quantity');
    $this->addField('year_published',['type'=>'date']);
    $this->hasMany('Borrow', new Borrow);
  }
}

class Borrow extends \atk4\data\Model {
  public $table = 'borrow';
  function init() {
    parent::init();
    $this->addField('date_checked_out',['type'=>'date']);
    $this->addField('date_returned',['type'=>'date']);
    $this->addField('returned');
    $this->addField('quantity');
  $this->hasOne('clientid', new Client)->addTitle();
  $this->hasOne('bookid' , new Book)->addTitle();
  }
}

class Librarian extends \atk4\data\Model {
  public $table = 'librarian';
  function init() {
    parent::init();
    $this->addField('name');
    $this->addField('surname');
    $this->addField('password',['type'=>'password']);
  }
}

/*
$form = $app->layout->add('Form');
$form->setModel(new Client($db));

$form->onSubmit(function ($form) {
   $form->model->save();
   $form->success('Record updated');
   return $app->jsRedirect(['index']);
 });

$crud = $app->layout->add('CRUD');
$crud->setModel(new Client($db));
$crud->addQuickSearch(['surname']);*/
