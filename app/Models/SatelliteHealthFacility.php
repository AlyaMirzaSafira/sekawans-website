<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SatelliteHealthFacility extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['id'];

    public $timestamps = false;

    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name ?? 'System';
        $name = $this->name;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('satellite health facility')
            ->setDescriptionForEvent(fn (string $eventName) => "{$user} {$eventName} satellite health facility {$name}");
    }

    public function patientDetails()
    {
        $this->hasMany(PatientDetail::class);
    }
}
