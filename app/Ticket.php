<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'project',
        'subject',
        'email',
        'description',
        'status',
        'tracker',
        'priority'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'tickets_users');
    }
}
