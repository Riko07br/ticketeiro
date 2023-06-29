<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model {
    use HasFactory;

    public function tickets() {
        return $this->hasMany(Ticket::class, 'stat_id');
    }
}
