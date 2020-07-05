<?php

namespace App\Http\Controllers\admin;

use App\Demand;
use App\Http\Controllers\Controller;
use App\Http\Requests\DemandRequest;
use App\Language;

use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class DemandsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Demand::all();
        return view('admin.demand.index',[
            'model'=>$model,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language_name = Language::all();
        return view('admin.demand.create',['language_name'=>$language_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandRequest $request)
    {
        $model = new Demand($request->all());
        $model->code = rand(10000000,99999999);
        if($model->save())
            return redirect()->route('demand.edit',[$model]);
        session(['error' => 'Save Failed!!please try again later.']);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
       ($language = Language::where('id', $demand->language_id)->first())? $language_name =$language->name :null;

       return view('admin.demand.show',[
           'model'=>$demand,
           'language_name'=>$language_name,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        $language_name = Language::all();
        return view('admin.demand.create',[
            'model'=>$demand,
            'language_name'=>$language_name

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DemandRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DemandRequest $request, $id)
    {
        $demand = Demand::find($id);
        if($demand){
            if ($demand->update($request->input()))
                return redirect()->route('demand.show',['demand'=>$demand]);
            session(['error' => 'Update Failed!!please try again later.']);
        }
        else{
            session(['error' => 'Not Found !!!']);
        }
        return redirect()->back();
    }



    public function status(Demand $demand,$status)
    {

        if($demand){
            if($demand->update(['status'=>$status]))
                return redirect()->back();
            session(['error' => 'Update Failed!!please try again later.']);
        }
        else{
            session(['error' => 'Not Found!!!']);

        }
        return redirect()->back();
    }
}
