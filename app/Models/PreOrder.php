<?php

namespace App\Models;

use App\Domains\Order\Enums\ProjectType;
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
        'user',
        'media'
    ];

    public function getAttachedMediaAttribute()
    {
        $mediaItems = $this->getMedia("*");
        $publicFullUrl = $mediaItems[0]->getFullUrl();
        return $publicFullUrl;

    }

    public function process()
    {
        return $this->belongsTo(Process::class, 'process_id', 'id');
    }

    public function getProjectTypeTextAttribute(): string
    {
        return ProjectType::toLabels()[$this->project_type];

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
