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

    /**
     * > The `getDateOfBirthAttribute` function is called when you try to access the `date_of_birth` attribute
     * of a `User` object
     * 
     * @param value The value of the attribute.
     * 
     * @return The birth date of the user.
     */
    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    /**
     * > The `setDateOfBirthAttribute` function is called when the `date_of_birth` attribute is set
     * 
     * @param value The value of the attribute.
     */
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = date('Y-m-d', strtotime($value));
    }

    /**
     * > The `getDocumentAttribute` function is called when you try to access the `document` attribute
     * of a `User` object
     * 
     * @param value The value of the attribute.
     * 
     * @return The document of the user.
     */
    public function getDocumentAttribute($value)
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $value);
    }

    /**
     * > The `setDocumentAttribute` function is called when the `document` attribute is set
     * 
     * @param value The value of the attribute.
     */
    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = preg_replace('/[^0-9]/', '', $value);
    }
}
