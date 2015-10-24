<?php

namespace App\Http\Controllers\Guest;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogsController extends Controller
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

    }

    public function show($id)
    {
        $products = $this->products->where('catalog_id','=',$id)->get();
        $catalog = $this->catalogs->findOrFail($id);

        return view('guest.catalogs.show')
            ->with('products', $products)
            ->with('catalog', $catalog);
    }

}
