<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $location
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sponsor extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'type',
        'location',
    ];

    //Один ко многим
    public function clubs()
    {
        return $this->hasMany(Club::class);
    }
}
