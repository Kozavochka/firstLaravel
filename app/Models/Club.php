<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @property int $id
 * @property string $name
 * @property int $players
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Club extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'players',
        'description',
    ];

    //У Клуба несколько игроков
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
