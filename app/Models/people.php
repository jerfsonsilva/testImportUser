<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    use HasFactory;

    public static function createPeople($people)
    {
        $fields = ['name', 'account', 'checked', 'description', 'interest', 'email', 'account'];
        $newPeople = new people;

        if(people::verifyUserExist($people) > 0) return false;
        //verifyAgeUser($user)
        foreach ($fields as $key => $field) {
            $newPeople[$field] = isset($people[$field]) ? $people[$field] : null;
        }
        $newPeople['date_of_birth'] = isset($people['date_of_birth']) ? date("Y-m-d", strtotime($people['date_of_birth'])) : null;
        if ($newPeople->save()) {
            if ($people['credit_card'])
                \App\Models\people_credit_card::createCard($people['credit_card'], $newPeople->id);
            return true;
        }
        return false;
    }
    public static function verifyUserExist($people)
    {
        return people::where('email', $people['email'])->where('account', $people['account'])->count();
    }
    public static function verifyAgeUser($people)
    {
        //TODO validation age of records between 18 and 65 (or unknown).
    }
}
