<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DemandRequest;
use Illuminate\Http\Request;
use App\Demand;
use function GuzzleHttp\Promise\all;

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
        return $model;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DemandRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandRequest $request)
    {
        $demand = new Demand($request->all());
//        $demand->user_id => 'if user login else null';
//        $demand->lnguage_id => use tbl_language;
//        $demand->logo => upload image ;

        $demand->code =  rand(10000000,99999999);
        if ($demand->save())
            return'save request';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model  = Demand::find($id);
        if($model)
            return $model;
        return 'not found';

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
                return "update request" ;
        }
        else{
            return 'not found';
        }

    }





}
