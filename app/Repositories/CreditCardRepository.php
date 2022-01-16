<?php

namespace App\Repositories;

use App\Http\Dtos\CardDto;
use App\Models\People_credit_card;
use App\Repositories\Interfaces\CreditCardRepositoryInteface;

class CreditCardRepository implements CreditCardRepositoryInteface
{
    private $model;
    private $fields = ['type', 'number', 'name', 'expirationDate'];

    public function create(CardDto $card, int $peopleId):?bool
    {
        $this->model = new People_credit_card();

        foreach ($this->fields as $key => $field) {
            $this->model[$field] = isset($card->$field) ? $card->$field : null;
        }
        $this->model['people_fk_id'] = $peopleId;
        try {
            return $this->model->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}