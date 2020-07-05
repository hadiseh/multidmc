<?php

namespace App\Http\Controllers\admin;

use App\Demand;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Language::all();
        return view('admin.language.index',['model'=>$model]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $model = new Language($request->all());
        if($model->save())
            return redirect()->route('language.edit',[$model]);
        session(['error' => 'Save Failed!!please try again later.']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {

        return view('admin.language.show',[
            'model'=>$language,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.language.create',[
            'model'=>$language
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LanguageRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {


        $language = Language::find($id);
        if($language){
            if ($language->update($request->input()))
                return redirect()->route('language.show',['language'=>$language]);
            session(['error' => 'Update Failed!!please try again later.']);
        }
        else{
            session(['error' => 'Not Found !!!']);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $demand =Demand::where('language_id', $id)->delete();
            if ($demand){
                $language=Language::findOrFail($id)->delete();
                return redirect()->route('language.index');
            }


        } catch (Throwable $e) {
            report($e);

            return redirect()->back();
        }

    }


}
