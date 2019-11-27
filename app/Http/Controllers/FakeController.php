<?php

namespace App\Http\Controllers;
use App\Entity\Stand;


class FakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $time =  \DateTime::createFromFormat('Y-m-d H:i:s',"2019-11-25 00:00:00");


        dd($time);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stands =  $this->getRepository()->findAll();

        $data = [];
        foreach ($stands as $stand){
            $data[] = [
                'id'=>$stand->getId(),
                'lat'=>$stand->getLatitude(),
                'lng'=>$stand->getLongitude(),
                'title'=>$stand->getName()
            ];
        };
        return view('fake', ['stands' => json_encode($data)]);
    }



    protected function getRepository()
    {
        return \EntityManager::getRepository(Stand::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
