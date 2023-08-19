<?php

namespace App\Filters\Students;

use App\Filters\AbstractFilter;

class StudentsFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameFilter::class,
        'email' => EmailFilter::class,
        'salary' => SalaryFilter::class,
    ];

}
