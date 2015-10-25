<?php

namespace App\Http\Controllers\Guest;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $catalogs;
    protected $products;

    public function __construct(Catalog $catalog, Product $product)
    {
        $this->catalogs = $catalog;
        $this->products = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return redirect('/');
    }

    public function show($id)
    {
        $product = $this->products->findOrfail($id);
        $catalog = $this->catalogs->findOrFail($product->catalog_id);

        return view('guest.products.show')
            ->with('product', $product)
            ->with('catalog', $catalog);
    }

}
