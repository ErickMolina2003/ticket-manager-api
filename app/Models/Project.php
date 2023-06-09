<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'projects_clients');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
