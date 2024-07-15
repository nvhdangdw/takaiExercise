<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'date', 'content', 'amount', 'type', 'client_id'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    // Mutator to convert date format when setting the attribute
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \DateTime::createFromFormat('d/m/Y H:i:s', $value)
            ->format('Y-m-d H:i:s');
    }

    // Accessor to convert date format when retrieving the attribute
    public function getDateAttribute($value)
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $value)
            ->format('d/m/Y H:i:s');
    }
}
