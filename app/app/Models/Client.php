<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
     * This PHP function formats a date of birth string into a "dd/mm/yyyy" format.
     * 
     * @param value  is a nullable string parameter that represents the date of birth in the format
     * 'Y-m-d' (e.g. '1990-01-01').
     * 
     * @return ?string a formatted date string in the format of "dd/mm/yyyy" if the input value is not
     * null, otherwise it returns null.
     */
    public function getDateOfBirthAttribute(?string $value): ?string
    {
        return $value ? date('d/m/Y', strtotime($value)) : null;
    }

    /**
     * This function sets the date of birth attribute in a specific format.
     * 
     * @param string value The value parameter is a string representing a date of birth in any format.
     */
    public function setDateOfBirthAttribute(string $value): void
    {
        $this->attributes['date_of_birth'] = date('Y-m-d', strtotime($value));
    }

    /**
     * This PHP function formats a document attribute (such as a Brazilian CPF or CNPJ) into a standardized
     * format.
     * 
     * @param value The input string that represents a document number (CPF or CNPJ). It can be null or
     * empty.
     * 
     * @return string a formatted string representing a document number (CPF or CNPJ) based on the input
     * value. If the input value has 14 characters, it is assumed to be a CNPJ and the function formats it
     * as "XX.XXX.XXX/XXXX-XX". If the input value has 11 characters, it is assumed to be a CPF and the
     * function formats it as "XXX
     */
    public function getDocumentAttribute(?string $value = ''): string
    {
        $value = Str::of($value)->replace(['.', '-', '/'], '');

        return strlen($value) == 14
            ? preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $value)
            : preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $value);
    }

    /**
     * This PHP function sets the "document" attribute of an object by removing any non-numeric characters
     * from the input value.
     * 
     * @param string value  is a string parameter representing the value to be set for the "document"
     * attribute.
     */
    public function setDocumentAttribute(string $value): void
    {
        $this->attributes['document'] = preg_replace('/[^0-9]/', '', $value);
    }
}
