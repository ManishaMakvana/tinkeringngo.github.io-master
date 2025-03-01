<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
    use HasFactory;

    protected $fillable = ['program_id', 'username', 'activity_name', 'due_date', 'status'];

    // Define relationship with Program model
    public function program() {
        return $this->belongsTo(Program::class);
    }
}
