<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;


class PropertyImage extends Model
{
    use HasFactory;
    protected $table = 'properties_images';

    protected $fillable = [
        'property_id', 'image'
    ];

    public function property()
    {
    return $this->belongsTo(Property::class);
    }

}
