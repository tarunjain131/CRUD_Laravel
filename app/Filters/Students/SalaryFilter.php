<?php

namespace App\Filters\Students;

class SalaryFilter
{
    public function filter($builder, $salary)
    {
        return $builder->where('salary','LIKE', '%'.$salary.'%');
    }
}
