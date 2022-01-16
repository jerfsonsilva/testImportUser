<?php

namespace App\Repositories\Interfaces;

interface PeopleRepositoryInterface
{
  public function create(Array $people ):?int;
}