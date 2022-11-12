<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
    ];

    /**
     * Организация связи с мероприятиями
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tags', 'tag_id', 'event_id');
    }
}
