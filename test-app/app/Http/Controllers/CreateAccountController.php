<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function execute($param1,$param2)
    {
        $model = [
          'param1' =>  $param1,
          'param2' =>  $param2
        ];

        return view('create-customer',$model);
    }

    public function index(Request $request)
    {
        $param1 = $request->input('id');
        $param2 = $request->input('param2');

        $params = $request->all();
            var_dump($params);
    }
}
