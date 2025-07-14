<?php

namespace App\Http\Components\Dto;

use Illuminate\Support\Str;

class BaseDto implements DtoInterface
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = get_object_vars($this);

        $properties = [];

        foreach ($array as $key => $value) {
            $method = 'get' . ucfirst($key);
            $properties[Str::snake($key)] = method_exists($this, $method) ? $this->$method() : $value;
        }

        return $properties;
    }
}
