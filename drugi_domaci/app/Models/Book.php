<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
