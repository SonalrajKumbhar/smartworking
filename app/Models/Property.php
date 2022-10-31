<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['county','county_id','town', 'description', 'postcode' , 'displayable_address', 'image_url', 'price', 'number_of_bedrooms', 'number_of_bathrooms', 'property_type', 'for_sale_for_rent'];
}
