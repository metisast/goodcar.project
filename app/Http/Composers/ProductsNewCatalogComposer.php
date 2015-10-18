<?php namespace App\Http\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ProductsNewCatalogComposer {

    protected $newProducts;

    public function __construct(Product $product)
    {
        $this->newProducts = $product->where('status_id', '=', 2)->take(4)->get();
    }

    public function compose(View $view)
    {
        $view->with('compNewProducts', $this->newProducts);
    }

}