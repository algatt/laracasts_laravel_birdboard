<?php

namespace App;

use App\RecordsActivity;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity;

    protected $guarded = [];

//    protected static $recordableEvents = ['created','updated'];


    public function path()
    {
    	return "/projects/{$this->id}";
    }

    public function owner()
    {
    	return $this->belongsTo(User::class);
    }

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
    	return $this->tasks()->create(compact('body'));
       
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }
    


}
