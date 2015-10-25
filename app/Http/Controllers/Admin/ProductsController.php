<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductsStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    protected $catalogs;
    protected $products;
    protected $i = 1;

    public function __construct(Catalog $catalog, Product $product){
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
        $products = $this->products->all();

        return view('admin.products.index')
            ->with('products', $products)
            ->with('i', $this->i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ProductsStatus $productsStatus
     * @return Response
     */
    public function create(ProductsStatus $productsStatus)
    {
        $catalogs = $this->catalogs->all();
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sProduct = $this->products->fill($request->all());
        $sProduct->save();

        return redirect(route('admin.products.edit', $sProduct->id));
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
     * @param ProductImages $productImages
     * @param  int  $id
     * @return Response
     */
    public function edit(ProductsStatus $productsStatus, ProductImages $productImages, $id)
    {
        $products = $this->products->findOrFail($id);
        $images = $productImages->where('product_id','=',$id)->get();

        $catalogs = $this->catalogs->all();
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
            ->with('images', $images)
            ->with('optCatalogs', $optCatalogs)
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
        $insertProduct = $this->products->findOrFail($id)->fill($request->all());
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
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $deleteProduct = $this->products->findOrFail($id);
        $deleteProduct->delete();

        return redirect(route('admin.products.index'));
    }


    /**
     * Методы для работы с изображениями для товаров
     * @param ProductImages $productImages
     * @param Request $requests
     * @param $id
     * @return Response
     */
    public function createImages($id, Request $requests, ProductImages $productImages)
    {
        //Директория для основного изображения
        $path = public_path().'/images/'.$id.'/';
        //Директория для миниатюр
        $pathThumbs = $path.'thumbs/';

        //Проверка на существование директории
        if(!file_exists($path))
        {
            $createDirectory = File::makeDirectory($path);
            $createThumbs = File::makeDirectory($pathThumbs);
        }

        //Добавим изображения в массив
        $images = $requests->file('title');

        //Пройдемся по массиву изображений и запишем их в наши директории
        for($i = 0; $i < count($images); $i++)
        {
            //Случайная строка для имени изображения
            $name = str_random(32).'.png';

            //Создаем переменную для роботы с изображениями
            $image = Image::make($images[$i]);
            //Изменим исходное изображение при этом сохраним пропорции
            $image->resize('800', null, function ($constraint){
                $constraint->aspectRatio();
            });
            //Сохраним измененное изображения в папку
            $image->save($path.$name);


            //Создаем переменную для роботы с миниатюрами
            $imageThumb = Image::make($images[$i]);
            //Изменим исходное изображение при этом сохраним пропорции
            $imageThumb->resize('180', null, function ($constraint){
                $constraint->aspectRatio();
            });
            //Сохраним измененное изображения в папку
            $imageThumb->save($pathThumbs.$name);

            //Запишем имя изображения в базу
            $productImages->create([
                'product_id' => $id,
                'title' => $name
            ]);
        }

        return redirect(route('admin.products.edit', $id));
    }
}
