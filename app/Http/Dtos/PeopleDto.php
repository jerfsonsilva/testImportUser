<?php
namespace App\Http\Dtos;

use App\Http\Dtos\Traits\FieldDefaultDtoTrait;
use Spatie\DataTransferObject\DataTransferObject;

class PeopleDto extends DataTransferObject{

    use FieldDefaultDtoTrait;

    public string $name;
    public string $address;
    public bool $checked;
    public string $description;
    public string $interest;
    public string $date_of_birth;
    public string $email;
    public string $account;

    public function __construct(array $data)
    {
        $this->name = !empty($data['name']) ? $data['name'] : '';
        $this->address = !empty($data['address']) ? $data['address'] : '';
        $this->checked = !empty($data['checked']) ? $data['checked'] : 0;
        $this->description = !empty($data['description']) ? $data['description'] : '';
        $this->interest = !empty($data['interest']) ? $data['interest'] : '';
        $this->date_of_birth = !empty($data['date_of_birth']) ? $data['date_of_birth'] : '';
        $this->email = !empty($data['email']) ? $data['email'] : '';
        $this->account = !empty($data['account']) ? $data['account'] : '';
    }
}