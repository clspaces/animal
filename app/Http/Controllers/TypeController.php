<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeCollection;
use App\Http\Resources\TypeResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types=Type::select('id','name','sort')->get();
        return new TypeCollection($types);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>['required','max:50',Rule::unique('types','name')],
            'sort'=>'nullable|integer'
        ]);
        if(!isset($request->sort)){
            $max=Type::max('sort');
            $request['sort']=$max+1;
        }
        $type=Type::create($request->all());
        return new TypeResource($type);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
        return new TypeResource($type);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
        $this->validate($request,[
            'name'=>['max:50',
            Rule::unique('types','name')->ignore($type->name,'name')],
            'sort'=>'nullable|integer'
        ]);
        $type->update($request->all());
        return new TypeResource($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
