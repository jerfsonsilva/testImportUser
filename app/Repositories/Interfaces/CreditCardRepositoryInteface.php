<?php

namespace App\Repositories\Interfaces;

interface CreditCardRepositoryInteface
{
  public function create(Array $card, int $peopleId ):?bool;
}