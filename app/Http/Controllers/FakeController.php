<?php

namespace App\Http\Controllers;

use App\Entity\Beacon;
use App\Entity\Repository\BeaconRepository;


class FakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $max = new \DateTime("12/01/2020 12:24:03");
        $min = new \DateTime("00/00/2019 12:24:03");

        $rows = $this->getRepository()->createQueryBuilder('u')
            ->select(
                'MAX(u.added) AS stop,
                MIN(u.added) as start, 
                u.lat as lat,
                u.long as long')
            ->where('u.speed = 0')
            ->andWhere('u.added < :max')
            ->andWhere('u.added > :min')
            ->setParameter('max', $max)
            ->setParameter('min', $min)
            ->groupBy('u.lat,u.long')

            ->getQuery()->getResult();


        dd($rows);
        foreach ($rows as $row) {

        }
        //class ,lat long , start , stop ,diff

    }

    protected function getRepository()
    {
        return \EntityManager::getRepository(Beacon::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stands = $this->getRepository()->findAll();

        $data = [];
        foreach ($stands as $stand) {
            $data[] = [
                'id' => $stand->getId(),
                'lat' => $stand->getLatitude(),
                'lng' => $stand->getLongitude(),
                'title' => $stand->getName()
            ];
        };
        return view('fake', ['stands' => json_encode($data)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
