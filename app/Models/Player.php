<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property int $price
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
        'price',
        'is_free',
        'club_id'
    ];

    //У Игрока один клуб
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    //Аксессор стоимость игрока
    public function getPlayerPriceAttribute()
    {
        return bcdiv($this->price,1000000,2) . ' mln€';
    }

    //Получение лиги игрока
    public function getPlayerLeagueAttribute()
    {
        return $this->club->league;
    }

    //Scope на возраст
    public function scopeOld(Builder $query):void
    {
        $query->where('age', '>=', '30');
    }
}
