<?php

namespace App\Http\Controllers\Api;

use App\Foo as FooModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Foo as FooRequest;
use Illuminate\Http\Request;

class Foo extends Controller
{
    public function store(FooRequest $request)
    {
        return FooModel::create($request->validated());
    }

    public function index(Request $request)
    {
        $filters = $request->get('filters', []);
        return FooModel::filters($filters)->get();
    }
}
