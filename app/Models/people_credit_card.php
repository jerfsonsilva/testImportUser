<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class people_credit_card extends Model
{
    use HasFactory;

    public static function createCard($card, $idPeople)
    {
        $fields = ['type','number','name','expirationDate'];
        $card = new people_credit_card;
        //TODO verify if it exists
        foreach ($fields as $key => $field) {
            $card[$field] = isset($card[$field]) ? $card[$field] : null;
        }
        $card['people_fk_id'] = $idPeople;
        $card->save();
    }

}
