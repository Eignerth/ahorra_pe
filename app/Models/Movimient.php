<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movimient extends Model
{
    protected $table='movimients';
    protected $fillable = ['goal_id', 'type','amount','date','observations'];

    public function scopeGetAll($query,$user_id)
    {
        return $query->join('goals', 'goals.id', '=', 'movimients.goal_id')
            ->select(
                'goals.id as goal_id',
                'goals.user_id as user_id',
                'goals.description as goal_description',
                'goals.total as goal_total',
                'goals.date_final as goal_date_final',
                'movimients.id as movimient_id',
                'movimients.goal_id as movimient_goal_id',
                'movimients.type as movimient_type',
                'movimients.amount as movimient_amount',
                'movimients.date as movimient_date',
                'movimients.observations as movimient_observations',
            )
            ->where(
                'goals.user_id',$user_id
            );
    }

}
