<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;


class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Poll $poll)
    {
        $value = Cache::get($poll->id);

        switch (request('choice')){
            case 'choice_1':
                if (isset($value->choice_1)){
                    $value->choice_1 +=1;
                    Cache::flush();
                    Cache::add($poll->id,$value);
                }else{
                    $app = app();
                    $object = $app->make('stdClass');
                    $object->choice_1 = 1;
                    if (isset($value->choice_2)){
                        $object->choice_2 = $value->choice_2;
                    }
                    if (isset($value->choice_3)){
                        $object->choice_3 = $value->choice_3;
                    }
                    Cache::flush();
                    Cache::add($poll->id,$object);
                }
                break;
            case 'choice_2':
                if (isset($value->choice_2)){
                    $value->choice_2 +=1;
                    Cache::flush();
                    Cache::add($poll->id,$value);
                }else{
                    $app = app();
                    $object = $app->make('stdClass');
                    $object->choice_2 = 1;
                    if (isset($value->choice_1)){
                        $object->choice_1 = $value->choice_1;
                    }
                    if (isset($value->choice_3)){
                        $object->choice_3 = $value->choice_3;
                    }
                    Cache::flush();
                    Cache::add($poll->id,$object);

                }
                break;
            case 'choice_3':
                if (isset($value->choice_3)){
                    $value->choice_3 +=1;
                    Cache::flush();
                    Cache::add($poll->id,$value);
                }else{
                    $app = app();
                    $object = $app->make('stdClass');
                    $object->choice_3 = 1;
                    if (isset($value->choice_1)){
                        $object->choice_1 = $value->choice_1;
                    }
                    if (isset($value->choice_2)){
                        $object->choice_2 = $value->choice_2;
                    }
                    Cache::flush();
                    Cache::add($poll->id,$object);
                }
                break;
        }
        $result = Cache::get($poll->id);
        return view('polls.result',compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
