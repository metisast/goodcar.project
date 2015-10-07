<?php namespace App\Http\Composers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ActivePage {


    public function compose(View $view)
    {
        $nav = [
            'AdminController' => "Активность",
            'BuyController' => "Покупки",
        ];

        $count = '';
        foreach($nav as $n => $controller)
        {
            if($controller == 1)
            {

            }
            $count .= "<p>$n</p>";
        }


        $view->with('count', $count);
    }

}