<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\FeatureStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    protected $features;
    protected $i = 1;

    public function __construct(Feature $feature)
    {
        $this->features = $feature;
    }
    /**
     * Контроллер характеристик товаров
     *
     * @return Response
     */
    public function index()
    {
        $features = $this->features->all();

        return view('admin.features.index')
            ->with('features', $features)
            ->with('i', $this->i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FeatureStatus $featureStatus
     * @return Response
     */
    public function create(FeatureStatus $featureStatus)
    {
        $status = $featureStatus->all();

        $optStatus = '<option value="0">Выберите статус</option>';
        foreach($status as $st) {
            $optStatus .= "<option value='$st->id'>$st->title</option>>";
        }

        return view('admin.features.create')
            ->with('optStatus', $optStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $createFeature = $this->features->fill($request->all());
        $createFeature->save();

        return redirect(route('admin.features.index'));
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
     * @param  int  $id
     * @param FeatureStatus $featureStatus
     * @return Response
     */
    public function edit($id, FeatureStatus $featureStatus)
    {
        $feature = $this->features->findOrFail($id);
        $status = $featureStatus->all();

        $optStatus = '<option value="0">Выберите статус</option>>';
        foreach($status as $st) {
            if ($st->id == $feature->status_id) {
                $optStatus .= "<option selected value='$st->id'>$st->title</option>>";
            } else {
                $optStatus .= "<option value='$st->id'>$st->title</option>>";
            }
        }

        return view('admin.features.edit')
            ->with('feature', $feature)
            ->with('optStatus', $optStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $feature = $this->features->findOrFail($id)->fill($request->all());
        $feature->save();

        return redirect(route('admin.features.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $features = $request->input('feature');

        for($i = 0; $i < count($features); $i++)
        {
            //$feature = $this->features->findOrFail($features[$i]);
            $this->features->destroy($features[$i]);
        }

        return redirect(route('admin.features.index'));
    }
}
