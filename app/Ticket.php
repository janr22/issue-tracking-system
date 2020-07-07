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
        'priority',
        'confidentiality',
        'lock'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'ticket_user');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
