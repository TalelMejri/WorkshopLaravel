<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guarded=[];// tous les champs sont accessible

    /* Ou bien */

    /*
     protected $fillable=[
        'title',
        'description',
     ];
     */
}
