<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro("JResp", function (
            int $status,
            int $code,
            int $extcode,
            string $type,
            string $message,
            $data = [],
            $errors = []) {

            $res['status'] = $status;
            $res['code'] = $code;
            $res['extcode'] = $extcode;
            $res['type'] = $type;
            $res['message'] = $message;
            $res['errors'] = is_object($errors) ? $errors : Arr::wrap($errors);
            $res['data'] = is_object($data) ? $data : Arr::wrap($data);

            return response()->json($res)->setStatusCode($code);
        });


        Response::macro("JOk", function ($payload = []) {
            return Response::JResp(0, 200, 0, "success", $payload, []);
        });


        Response::macro("JException", function ($message, $errors = []) {
            return Response::JResp(1, 500, 0, "exception", $message, [], $errors);
        });


        Response::macro("JValidation", function ($errors = []) {
            return Response::JResp(1, 422, 0, "validation", "Invalid input", [], $errors);
        });
    }
}
