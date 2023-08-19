<?php

namespace App\Filters\Students;

class NameFilter
{
    public function filter($builder, $name)
    {
        return $builder->where('name', 'LIKE', '%' . $name . '%');
    }
}
