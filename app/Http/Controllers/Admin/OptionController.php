<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    
   public function index()
{
    return view('admin.options.index', [
        'options' => Option::paginate(25)
    ]);
}


    /** 
     * Show the form for creating a new resource.
     */
   public function create()
{
    $option = new Option();
   
    return view('admin.options.form',[
        'option'=>$option
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.option.index')->with('success' ,'l\`option a été creer');
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
    public function edit(Option $option)
    {
        return view('admin.options.form',[
            'option'=>$option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success','l\'option a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
       return to_route('admin.option.index')->with('success','l\'Option est supprimé'); 
    }
}
