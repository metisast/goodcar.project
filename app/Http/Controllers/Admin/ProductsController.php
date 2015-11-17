<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\ProductFeatures;
use App\Models\ProductImages;
use App\Models\ProductsStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    protected $catalogs;
    protected $products;
    protected $requests;
    protected $i = 1;

    public function __construct(Catalog $catalog, Product $product, Request $request){
        $this->catalogs = $catalog;
        $this->products = $product;
        $this->requests = $request;
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
     * @return Response
     */
    public function store()
    {
        $sProduct = $this->products->fill($this->requests->all());
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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $insertProduct = $this->products->findOrFail($id)->fill($this->requests->all());
        $insertProduct->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $btnProducts = $request->input('btnProducts');

        if($btnProducts == 'on')
        {
            $products = $request->input('products');
            $this->products->destroy($products);

            return redirect(route('admin.products.index'));
        }
    }

    /**
     * Методы для работы с изображениями товаров
     * @param ProductImages $productImages
     * @param $id
     * @return Response
     */
    public function createImages($id, ProductImages $productImages)
    {
        //Директория для основного изображения
        $path = public_path().'/images/'.$id.'/';
        //Директория для миниатюр
        $pathThumbs = $path.'thumbs/';

        //Добавим изображения в массив
        $images = $this->requests->file('title');

        //Пройдемся по массиву изображений и запишем их в наши директории
        for($i = 0; $i < count($images); $i++)
        {
            //Проверяем на пустоту элементов массива
            if($images[$i] == null)
            {
                //Возвращаем пользователя, если элемент массива пустой
                return redirect(route('admin.products.edit', $id));
            }

            //Проверка на существование директории
            if(!file_exists($path))
            {
                File::makeDirectory($path);
                File::makeDirectory($pathThumbs);
            }

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

    /**
     * Активация основного изображения
     *
     * @param $id
     * @param $image
     * @return Response
     */
    public function mainImage($id, $image)
    {
        $product = $this->products->findOrFail($id);
        $product->main_image = $image;
        $product->save();

        return redirect(route('admin.products.edit', $id));
    }

    /**
     * Массовое удаление изображений
     *
     * @param ProductImages $productImages
     * @param $id
     * @return Response
     */
    public function deleteImages($id, ProductImages $productImages)
    {
        //Директория для основного изображения
        $path = public_path().'/images/'.$id.'/';
        //Директория для миниатюр
        $pathThumbs = $path.'thumbs/';

        $mainImage = $this->products->findOrFail($id);

        $images = $this->requests->input('image');

        for($i = 0; $i < count($images); $i++)
        {
            if($mainImage->main_image == $images[$i])
            {
                $mainImage->main_image = '';
                $mainImage->save();
            }

            File::delete($path.$images[$i]);
            File::delete($pathThumbs.$images[$i]);

            $dbDelete = $productImages->where('title','=', $images[$i]);
            $dbDelete->delete();
        }

        //Проверяем на пустоту директории с текущими изображениями
        if (($files = @scandir($path)) && count($files) <= 3) {
            //Удаляем директории если они пусты
            rmdir($pathThumbs);
            rmdir($path);
        }

        return redirect(route('admin.products.edit', $id));
    }

    /**
     * Отображение характеристик к товару
     *
     * @param $id
     * @return Response
     */
    public function createFeatures($id)
    {
        //Получаем текущий продукт
        $product = $this->products->findOrFail($id);
        //Получаем каталог к которому относится продукт
        $catalog = $product->catalog;
        //Получаем все характеристики по каталогу
        $features = $this->catalogs->findOrFail($catalog->id)->features;

        return view('admin.products.features')
            ->with('product', $product)
            ->with('features', $features);

    }

    /**
     * Массовое добавление характеристик к товару
     *
     * @param $id
     * @param Request $request
     * @param ProductFeatures $pFeatures
     * @return Response
     */
    public function storeFeatures($id, Request $request, ProductFeatures $pFeatures)
    {
        //Получаем все характеристики из полей, кроме кнопки и токена
        $input = $request->except('btnAddFeatures', '_token');
        //Получаем текущий продукт
        $product = $this->products->findOrFail($id);
        //Получаем все характеристики, которые относятся к привязанному каталогу товара
        $features = $this->catalogs->findOrFail($product->catalog_id)->features;
        //Возвращает все или некоторое подмножество ключей массива
        $keysFeature = array_keys($input);

        //Перебераем все характеристики каталога
        foreach($features as $f)
        {
            //Перебираем все подмножество ключей
            for($i = 0; $i < count($keysFeature); $i++)
            {
                //Если ключ соотвествует ключу из массива характеристик каталога записываем его в базу
                if($keysFeature[$i] == $f->id)
                {
                    $pFeatures
                        ->where('feature_id','=',$keysFeature[$i])
                        ->where('product_id','=', $product->id)
                        ->delete();
                    $pFeatures->create([
                        'product_id' => $product->id,
                        'feature_id' => $f->id,
                        'title' => $input[$keysFeature[$i]]
                    ]);
                    //Если нашли ключ, то выходим из цикла for
                    break;
                }
            }

        }
    }

}
