<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Task extends Model
{
    protected $fillable = [
        'name',
        'difficulty',
        'duration',
    ];

    protected $casts = [
        'difficulty' => 'integer',
        'duration' => 'float',
    ];

    public function isValid(): bool
    {
        $rules = [
            'name' => 'required|string|max:255',
            'difficulty' => 'required|integer|min:1|max:5',
            'duration' => 'required|numeric|min:0.5|max:24',
        ];

        $validator = Validator::make($this->attributesToArray(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            /* @TODO: Logger $errors */
        }

        return !$validator->fails();
    }

    public static function createTask($name, $duration, $difficulty)
    {
        return self::create([
            'name' => $name,
            'duration' => $duration,
            'difficulty' => $difficulty,
        ]);
    }

    public function developer()
    {
        return $this->hasOne(Developer::class, 'id', 'developer_id');
    }

    public function calculateEffortHour(){
        return $this->duration *  $this->difficulty;
    }
}
