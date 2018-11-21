<?php

namespace Playground\Controllers;

class IndexController
{
  public function __construct()
  {
    echo 'Heres the index controller';
  }

  public function index()
  {
      echo 'heres the index action of the index controller';
  }
}