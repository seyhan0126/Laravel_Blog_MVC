<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table='contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function contatBy(User $user){
        return $user->id === $this->user_id;
    }
}
