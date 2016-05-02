<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
     * Defining "Relationship"
     * "Product" belongs to "Category"
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
?>