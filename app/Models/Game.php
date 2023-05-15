<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Game extends Model
{
    use HasFactory;

//    protected $guarded =[];
    protected $fillable =[
    'name'
    ];

    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }
}
