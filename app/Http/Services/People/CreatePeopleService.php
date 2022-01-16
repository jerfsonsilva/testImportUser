<?php

namespace App\Http\Services\People;

use App\Http\Dtos\PeopleDto;
use App\Repositories\Interfaces\PeopleRepositoryInterface;

class CreatePeopleService
{
    private PeopleRepositoryInterface $peopleRepositoryInterface;

    public function __construct(PeopleRepositoryInterface $peopleRepositoryInterface)
    {
        $this->peopleRepositoryInterface = $peopleRepositoryInterface;
    }
    
    public function execute(PeopleDto $people): ?int
    {
        try {
            return $this->peopleRepositoryInterface->create($people);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
