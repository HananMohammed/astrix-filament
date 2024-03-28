<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    use HasFactory;

    protected $with = [
        'process',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class, 'process_id', 'id');
    }
}
