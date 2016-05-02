<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    /*
     * Getting all "Categories" ordered by "Title"
     */
    public function getCategory()
    {
        return Category::orderBy('title')
            ->get();
    }
}
?>