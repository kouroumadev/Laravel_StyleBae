<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'gender',
        'location',
        'detail',
        'date1',
        'date2',
        'logo',
        'image1',
        'image2',

    ] ;

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
