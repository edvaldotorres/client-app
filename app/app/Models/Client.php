<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /* `` is an array that specifies which attributes of the `Client` model can be mass
   assigned. In other words, when creating or updating a `Client` instance, only the attributes
   listed in `` can be set using an array. This is a security feature that helps prevent
   unintended changes to the model's data. */

    protected $fillable = [
        'name_client',
        'date_of_birth',
        'document',
        'image',
        'name_social',
    ];
}
