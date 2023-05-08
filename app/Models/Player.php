<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property boolean $is_free
 * @property int $club_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'age',
        'is_free',
        'club_id'
    ];

    //У Игрока один клуб
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
