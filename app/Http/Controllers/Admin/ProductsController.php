<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\ProductsStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $i = 1;
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return Response
     */
    public function index(Product $product)
    {
        $products = $product->all();

        return view('admin.products.index')
            ->with('products', $products)
            ->with('i', $this->i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ProductsStatus @productsStatus
     * @param Catalog $catalog
     * @return Response
     */
    public function create(Catalog $catalog, ProductsStatus $productsStatus)
    {
        $catalogs = $catalog->all();
        $pStatus = $productsStatus->all();

        $optCatalogs = '<option value="0">Выберите каталог</option>>';
        foreach($catalogs as $cat) {
            $optCatalogs .= "<option value='$cat->id'>$cat->title</option>>";
        }

        $optStatus = '<option value="0">Выберите статус</option>>';
        foreach($pStatus as $pS) {
            $optStatus .= "<option value='$pS->id'>$pS->title</option>>";
        }

        return view('admin.products.create')
            ->with('optCatalogs', $optCatalogs)
            ->with('optStatus', $optStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Product $product)
    {
        $sProduct = $product->fill($request->all());
        $sProduct->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductsStatus $productsStatus
     * @param Catalog $catalog
     * @param Product $product
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product,Catalog $catalog, ProductsStatus $productsStatus, $id)
    {
        $products = $product->findOrFail($id);

        $catalogs = $catalog->all();
        $pStatus = $productsStatus->all();

        $optCatalogs = '<option value="0">Выберите каталог</option>>';
        foreach($catalogs as $cat) {
            if($cat->id == $products->catalog_id)
            {
                $optCatalogs .= "<option selected value='$cat->id'>$cat->title</option>>";
            }
            else
            {
                $optCatalogs .= "<option value='$cat->id'>$cat->title</option>>";
            }
        }

        $optStatus = '<option value="0">Выберите статус</option>>';
        foreach($pStatus as $pS) {
            if($pS->id == $products->status_id)
            {
                $optStatus .= "<option selected value='$pS->id'>$pS->title</option>>";
            }
            else
            {
                $optStatus .= "<option value='$pS->id'>$pS->title</option>>";
            }

        }

        return view('admin.products.edit')
            ->with('products', $products)
            ->with('optCatalogs', $optCatalogs)
            ->with('optStatus', $optStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,Product $product, $id)
    {
        $insertProduct = $product->findOrFail($id)->fill($request->all());
        $insertProduct->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param  int  $id
     * @return Response
     */
    public function delete(Product $product, $id)
    {
        $deleteProduct = $product->findOrFail($id);
        $deleteProduct->delete();

        return redirect(route('admin.products.index'));
    }
}
