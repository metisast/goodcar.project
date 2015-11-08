<?php

/**
 *  Контроллер управления каталогами товаров
 */

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use App\Models\CatalogFeature;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogsController extends Controller
{
    protected $i = 1;

    /**
     * Display a listing of the resource.
     *
     * @param Catalog $catalog
     * @return Response
     */
    public function index(Catalog $catalog)
    {
        $catalogs = $catalog->all();

        return view('admin.catalogs.index')
            ->with('catalogs', $catalogs)
            ->with('i', $this->i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param Catalog $catalog
     * @return Response
     */
    public function store(Request $request, Catalog $catalog)
    {
        $catalog->title = $request->input('title');
        $catalog->save();

        return redirect(route('admin.catalogs.index'))
                ->with('message', 'Success');
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
     * @param Catalog $catalog
     * @param  int  $id
     * @return Response
     */
    public function edit(Catalog $catalog, $id)
    {
        $catalogs = $catalog->findOrFail($id);

        return view('admin.catalogs.edit')
            ->with('catalogs', $catalogs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Catalog $catalog
     * @param  Request  $request
     * @param  CatalogFeature $catalogFeature
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Catalog $catalog, CatalogFeature $catalogFeature, $id)
    {
        $cat = $catalog->findOrFail($id);
        $btnSubmit = $request->input('submit');
        $btnFeatures = $request->input('btn-features');

        if($btnSubmit == "on")
        {
            $cat->title = $request->input('title');
            $cat->save();

            return redirect(route('admin.catalogs.edit', $id));
        }

        if($btnFeatures == "on")
        {
            $features = $request->input('features');

            for($i = 0; $i < count($features); $i++)
            {
                $catalogFeature->create([
                    'catalog_id' => $id,
                    'feature_id' => $features[$i]
                ]);
            }

            return redirect(route('admin.catalogs.index'));
        }

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
     * @param Catalog $catalog
     * @param  int  $id
     * @return Response
     */
    public function delete(Catalog $catalog, $id)
    {
        $cat = $catalog->findOrFail($id);
        $cat->delete();

        return redirect(route('admin.catalogs.index'));
    }

    /**
     *  Редактирование характеристик каталогов
     *
     * @param Catalog $catalog
     * @param Feature $feature
     * @param CatalogFeature $catalogFeature
     * @param  int  $id
     * @return Response
     */
    public function features(Catalog $catalog, Feature $feature, $id)
    {
        $test = $feature->getFeatures($id, $catalog);
        dd($test);

        $catalog = $catalog->findOrFail($id);
        $features = $feature->all();

        $catsFeats = Catalog::find(13)->features;

        return view('admin.catalogs.features')
            ->with('catalog', $catalog)
            ->with('features', $features)
            ->with('catsFeats', $catsFeats);
    }

}
