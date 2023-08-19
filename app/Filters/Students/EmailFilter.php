<?php

namespace App\Filters\Students;

class EmailFilter
{
    public function filter($builder, $email)
    {
        return $builder->where('email', 'LIKE', '%'.$email.'%');
    }
}
