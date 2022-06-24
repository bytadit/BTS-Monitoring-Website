<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function btslist(){
        return $this->belongsTo(Btslist::class);
    }
    public function survey(){
        return $this->belongsTo(Survey::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function offeredanswer(){
        return $this->belongsTo(Offeredanswer::class);
    }
}
