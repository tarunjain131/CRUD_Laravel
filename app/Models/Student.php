<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Students\StudentsFilter;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='students';
    protected $primaryKey='id';
    protected $fillabe=['name','email','salary'];
    public $timestamps = true;

}
    // ... Your model's properties and methods ...



// public function scopeFilter(Builder $builder, $request )
//     {
//         return (new StudentsFilter($request))->filter($builder);
//     }
// }

