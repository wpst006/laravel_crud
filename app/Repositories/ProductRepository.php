<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    /*
     * Getting all "Products" together with "Category"
     * order by Product "Title"
     */
    public function getAllProduct()
    {
        //eager loading of "product" with "category"
        return Product::with('category')
            ->orderBy('title')
            ->get();
    }

    /*
     * Getting "Product" by "ProductID (Primary Key)"
     */
    public function getProductByProductID($productID)
    {
        return Product::find($productID);
    }

    /*
     * Saving/Updating "Product"
     */
    public function saveProduct($title, $categoryID,
        $quantity, $price, $productID = null)
    {
        if (isset($productID)) {
            $product = Product::find($productID);
        } else {
            $product = new Product();
        }

        $product->title = $title;
        $product->category_id = $categoryID;
        $product->quantity = $quantity;
        $product->price = $price;

        return $product->save();
    }

    /*
     * Deleting "Product"
     */
    public function deleteProduct($productID)
    {
        $product = Product::find($productID);
        return $product->delete();
    }
}
?>