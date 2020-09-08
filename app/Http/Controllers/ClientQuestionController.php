<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaveOne;

class ClientQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.question');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function waveOne(Request $request)
    {
        $user = auth('api')->user();
        $wave_one = $user->waveOne->update($request->all());

        if ($request->q7 == 1 || $request->q7 == 2) {
            $url = '/workflow_one';
            return response()->json(['url' => $url]);
        };

        return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $phone = $user->waveOne()->firstOrNew([]);
        $phone->about_me = $request->about_me;
        $phone->save();
        return redirect(route('client.question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function workflowOne()
    {
        return view('client.wave_one');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
