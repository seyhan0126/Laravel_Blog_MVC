<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; 
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'post','user_id','image'
     ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ownedBy(User $user){
        return $user->id === $this->user_id;
    }

}
