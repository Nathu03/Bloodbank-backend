<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ScheduleEvent extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'schedule_events';
    protected $fillable = ['userid', 'title', 'location', 'date', 'description'];
}

