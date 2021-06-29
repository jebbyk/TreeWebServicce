<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElementController\ChangeParentRequest;
use App\Http\Requests\ElementController\DeleteRequest;
use App\Http\Requests\ElementController\GetRequest;
use App\Models\Element;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ElementController extends BaseController
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

    public function changeParent(ChangeParentRequest $request)
    {
        return Response::JOk("chageParrentRequest");
    }

    public function get(GetRequest $request)
    {
        return Response::JOk("getRequest");
    }

    public function delete(DeleteRequest $request)
    {
        return Response::JOk("deleteRequest");
    }
}
