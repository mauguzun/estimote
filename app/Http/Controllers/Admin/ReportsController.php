<?php

namespace App\Http\Controllers\Admin;


use App\Entity\Beacon;
use App\Entity\Country;
use App\Entity\Raport;
use App\Entity\Repository\BeaconRepository;
use App\Entity\Stand;
use App\Services\InfoService;
use App\Services\UserService;
use DoctrineProxies\__CG__\App\Entity\Aircraft;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;

class ReportsController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/report';


    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    //start stop ts
    public function index()
    {
        return view('admin.reports.form',
            ['ts' => ['f015bb8c5dcc5351bbd5c16e90196332' => 'f015bb8c5dcc5351bbd5c16e90196332']]);
    }


    public function show()
    {

        if (isset($_GET) && isset($_GET['start']) && isset($_GET['ts']) && isset($_GET['stop'])) {
            $stop = new \DateTime($_GET['stop']);
            $start = new \DateTime($_GET['start']);



            $reportRows = $this->getRepository()->reportQuery($start, $stop, $_GET['ts']);


            $airRepo = \EntityManager::getRepository(Aircraft::class);



            $step = $this->getRepository()->steps($start, $stop, $_GET['ts']);


            $stands = \EntityManager::getRepository(Stand::class)->findAll();
            $data = [];
            foreach ($stands as $stand) {
                $data[] = [
                    'id' => $stand->getId(),
                    'lat' => $stand->getLatitude(),
                    'lng' => $stand->getLongitude(),
                    'title' => $stand->getName()
                ];
            };
            return view('admin.reports.index', [
                'items' => $reportRows,
                'steps' => json_encode($step),
                'points' => json_encode($reportRows),
                'stands' => json_encode($data)
            ]);
        }
        return redirect($this->redirect);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|BeaconRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Beacon::class);
    }

    public function create()
    {
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        return redirect($this->redirect);
    }


    public function update(Request $request, $id)
    {

        return redirect($this->redirect);
    }

    public function store(Request $request)
    {
        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'eta' => 'required|date_format:H : i',
                'tail' => 'required',
                'status' => 'required',
                'stand' => 'required',
            ]
        ];
    }

}