<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
        Log::info(" ");
        Log::info("====================================");
        /** @var $root_element Element*/
        $root_element = Element::query()
            ->where('parent_id', '=', NULL)->first();


        $parent = $root_element->parent()->first();
        Log::info('parent: ' . $parent->name);
        Log::info('     root: ' . $root_element->name);

        $root_element->children()->each(function($element){
            Log::info('         children: ' . $element->name);
        });

    }
}
