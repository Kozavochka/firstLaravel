<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @property int $id
 * @property string $name
 * @property Carbon $updated_at
 *
 */
class League extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Отношение к клубам
    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    //Отношение к игрокам через клуб
    public function players()
    {
       return $this->hasManyThrough(Player::class,Club::class);
    }
}
