<?php namespace App\Http\Composers;

use App\Models\Catalog;
use Illuminate\View\View;

class GuestTopNavComposer {

    protected $catalogs;

    public function __construct(Catalog $catalog)
    {
        $this->catalogs = $catalog->all();
    }

    public function compose(View $view)
    {
        $view->with('compCatalogs', $this->catalogs);
    }

}