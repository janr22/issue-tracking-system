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
        'lock',
        'owner_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'ticket_user');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'label_ticket');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
