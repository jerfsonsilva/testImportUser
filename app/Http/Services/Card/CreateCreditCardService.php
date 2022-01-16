<?php

namespace App\Http\Services\Card;

use App\Http\Dtos\CardDto;
use App\Http\Dtos\PeopleDto;
use App\Repositories\Interfaces\CreditCardRepositoryInteface;

class CreateCreditCardService
{
    private CreditCardRepositoryInteface $creditCardRepositoryInteface;

    public function __construct(CreditCardRepositoryInteface $creditCardRepositoryInteface)
    {
        $this->creditCardRepositoryInteface = $creditCardRepositoryInteface;
    }

    public function execute(CardDto $card, int $peopleId): ?int
    {
        try {
            return $this->creditCardRepositoryInteface->create($card, $peopleId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
