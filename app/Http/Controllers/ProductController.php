<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    /*
    * "Dependency Injection" with "constructor"
    */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /*
    * Displaying "Products" and their "Categories"
    */
    public function index()
    {
        $products = $this->productRepository->getAllProduct();
        return view('products.index', ['products' => $products]);
    }

    /*
    * Rendering "Product" Add New/Update Form
    */
    public function setup($productID = null)
    {
        if (!isset($productID)) {
            $product = null;
        } else {
            $product = $this->productRepository->getProductByProductID($productID);
        }

        return view(
            'products.setup',
            [
                'categories' => $this->categoryRepository->getCategory(),
                'selectedCategoryID' => isset($product->category_id) ? $product->category_id : null,
                'product' => $product
            ]
        );
    }

    /*
    * Accepting the Form POST of adding/updating "Product"
    */
    public function save(Request $request)
    {
        $this->productRepository->saveProduct(
            $request->title, $request->category_id,
            $request->quantity, $request->price, $request->product_id);

        // Displaying Message
        \Session::flash('message', 'Product ' . $request->title . ' is successfully saved.');
        // Redirection to Product Display Page
        return \Redirect::to('/product/index');
    }

    /*
    * Deleting the "Product"
    */
    public function delete($productID)
    {
        $this->productRepository->deleteProduct($productID);

        // Displaying Message
        \Session::flash('message', 'Product is successfully deleted.');
        // Redirection to Product Display Page
        return \Redirect::to('/product/index');
    }
}
?>