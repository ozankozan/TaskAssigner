<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'level'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'developer_id', 'id');
    }
}
