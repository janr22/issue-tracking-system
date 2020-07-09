<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'label_ticket');
    }
}
