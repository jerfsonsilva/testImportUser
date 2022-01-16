<?php
namespace App\Http\Dtos;

use App\Http\Dtos\Traits\FieldDefaultDtoTrait;
use Spatie\DataTransferObject\DataTransferObject;

class CardDto extends DataTransferObject{

    use FieldDefaultDtoTrait;

    public string $type;
    public string $number;
    public string $name;
    public string $expirationDate;

    public function __construct(array $data)
    {
        $this->type = !empty($data['type']) ? $data['type'] : '';
        $this->number = !empty($data['number']) ? $data['number'] : '';
        $this->name = !empty($data['name']) ? $data['name'] : '';
        $this->expirationDate = !empty($data['expirationDate']) ? $data['expirationDate'] : '';
    }
}