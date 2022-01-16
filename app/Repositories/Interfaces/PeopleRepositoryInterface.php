<?php

namespace App\Repositories\Interfaces;

use App\Http\Dtos\PeopleDto;

interface PeopleRepositoryInterface
{
  public function create(PeopleDto $people ):?int;
}