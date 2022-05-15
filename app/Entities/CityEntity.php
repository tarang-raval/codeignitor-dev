<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CityEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getCityName(string $String)
    {
        $this->attributes['city_name'] = strtoupper($string);

        return $this;
    }
}
