<?php

namespace App\Repositories\Interfaces;

use App\Http\Dtos\CardDto;

interface CreditCardRepositoryInteface
{
  public function create(CardDto $card, int $peopleId ):?bool;
}