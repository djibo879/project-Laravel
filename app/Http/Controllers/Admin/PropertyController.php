<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Option;


class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class,'property');
    }

    
   public function index()
{
    return view('admin.properties.index', [
        'properties' => Property::orderBy('created_at', 'desc')->paginate(6)
    ]);
}


    /** 
     * Show the form for creating a new resource.
     */
   public function create()
{
    $property = new Property();
    $property->fill([
        'surface' => 40,
        'rooms' => 3,
        'bedrooms' => 1,
        'floor' => 0,
        'city' => 'Montréal',
        'postal_code' => 34000,
        'sold' => false,

    ]);
    return view('admin.properties.form',[
        'property'=>$property,
        'options'=>Option::pluck('name','id'),
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        $property->attachFiles($request->validated('pictures'));
        return to_route('admin.property.index')->with('success' ,'le bien a été creer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form',[
            'property'=>$property,
            'options'=>Option::pluck('name','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
         $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
       $property->attachFiles($request->validated('pictures'));
        return to_route('admin.property.index')->with('success','le bien est modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Picture::destroy(
        $property->pictures()->pluck('id') );
        $property->delete();
       return to_route('admin.property.index')->with('success','le bien est supprimé'); 
    }
    
}
