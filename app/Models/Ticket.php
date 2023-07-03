<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stat_id',
        'priority_id',
        'categories',
        'labels',
        'title',
        'description',
        'files',
    ];

    //relationships
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent() {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function stat() {
        return $this->belongsTo(Stat::class, 'stat_id');
    }

    public function priority() {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryTicket::class);
    }

    public function labels() {
        return $this->belongsToMany(Label::class)->using(LabelTicket::class);
    }
}
