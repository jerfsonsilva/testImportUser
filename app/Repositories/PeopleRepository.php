<?php

namespace App\Http\Repositories;

use App\Models\People;
use \App\Http\Controllers\util\FormatDateController as FormatDateController;
use App\Http\Dtos\PeopleDto;
use App\Repositories\Interfaces\PeopleRepositoryInterface;

class PeopleRepository implements PeopleRepositoryInterface
{
    private $model;
    private $fields = ['name', 'address', 'account', 'checked', 'description', 'interest', 'email', 'account'];

    public function create(PeopleDto $people):?int
    {
        $this->model = new People();

        if ($this->verifyUserExist($people) > 0 || !$this->verifyAgeUser($people->date_of_birth)) return 0;
        
        foreach ($this->fields as $key => $field) {
            $this->model[$field] = isset($people->$field) ? $people->$field : null;
        }
        $this->model['date_of_birth'] = ($people->date_of_birth != null && $people->date_of_birth != 'null') ? FormatDateController::formatDate($people->date_of_birth): null;
        try {
            if($this->model->save()) return $this->model->id;
        } catch (\Throwable $th) {
            throw $th;
        }

        return 0;
    }
    public function verifyUserExist(PeopleDto $people)
    {
        $this->model = new People();

        return $this->model::where('email', $people->email)->where('account', $people->account)->count();
    }
    public function verifyAgeUser($date)
    {
        if($date === null || $date === 'null') return true;
        $age = \Carbon\Carbon::parse(FormatDateController::formatDate($date))->age;
        return $age > 17 && $age < 66; 
    }

}
