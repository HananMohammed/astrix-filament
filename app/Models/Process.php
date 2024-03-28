<?php

namespace App\Models;

use App\Domains\Order\Enums\ProcessStep;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $casts = [
        'account_manager' => 'json',
        'contact_info' => 'json',
        'primary_package' => 'json',
        'primary_packaging_accessories' => 'json',
        'primary_color' => 'json',
        'secondary_packaging' => 'json',
        'information' => 'json',
        'formula_details' => 'json',
    ];

    protected $appends = ['step_text'];
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approve(): void
    {
        $this->step = ProcessStep::order()->value;
        $this->save();
    }

    public function reject(): void
    {
        $this->step = ProcessStep::rejected()->value;
        $this->save();
    }

    public function pre_order()
    {
        return $this->hasOne(PreOrder::class, 'process_id', 'id');
    }

    public function getStepTextAttribute()
    {
        return ProcessStep::steps()[$this->step];

    }
}
