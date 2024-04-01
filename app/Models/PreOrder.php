<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PreOrder extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $with = [
        'process',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class, 'process_id', 'id');
    }
}
