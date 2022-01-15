<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Http\Controllers\util\FormatDateController as FormatDateController;

class people extends Model
{
    use HasFactory;

    public static function createPeople($people)
    {
        $fields = ['name', 'account', 'checked', 'description', 'interest', 'email', 'account'];
        $newPeople = new people;

        if (people::verifyUserExist($people) > 0 || !people::verifyAgeUser($people['date_of_birth'])) return false;
 
        foreach ($fields as $key => $field) {
            $newPeople[$field] = isset($people[$field]) ? $people[$field] : null;
        }
        $newPeople['date_of_birth'] = ($people['date_of_birth'] != null && $people['date_of_birth'] != 'null') ? FormatDateController::formatDate($people['date_of_birth']): null;
        
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
    public static function verifyAgeUser($date)
    {
        if($date === null || $date === 'null') return true;
        $age = \Carbon\Carbon::parse(FormatDateController::formatDate($date))->age;
        return $age > 17 && $age < 66; 
    }
}
