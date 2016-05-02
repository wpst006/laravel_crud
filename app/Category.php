<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
     * Defining "Relationship"
     * "Category" has Many "Products"
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
?>