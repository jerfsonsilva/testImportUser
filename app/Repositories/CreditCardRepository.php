<?php

namespace App\Repositories;

use App\Controllers\Controller;
use App\Models\people_credit_card;
use App\Repositories\Interfaces\CreditCardRepositoryInteface;
use Illuminate\Http\Request;

class CreditCardRepository implements CreditCardRepositoryInteface
{
    private $model;
    private $fields = ['type', 'number', 'name', 'expirationDate'];

    public function create(Array $card, int $peopleId):?bool
    {
        $this->model = new people_credit_card();
        
        foreach ($this->fields as $key => $field) {
            $this->model[$field] = isset($card[$field]) ? $card[$field] : null;
        }
        $this->model['people_fk_id'] = $peopleId;
        try {
            return $this->model->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}