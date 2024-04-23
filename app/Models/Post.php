<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    protected $dateFormat = 'Y-m-d H:i';

    protected $fillable = ['user_id', 'title', 'content', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Mutators
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->format($this->dateFormat);
    }

    /**
     * Relationship
     *
     */
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
