<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 08/12/2016
 * Time: 14:07
 */

namespace App\Http\Controllers\Admin;

use App\Entity\Aircraft;
use App\Entity\Country;
use App\Entity\Device;
use App\Entity\Repository\StandRepository;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;

class AircraftsController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/aircrafts';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();




    }

    /**
     * @return object|null
     */
    private  function device(){
        return \EntityManager::getRepository(Device::class) ->findOneBy(['user' => \Auth::user()]);
    }

    public function index()
    {
        // 1 check if exist device in user_device ?

        if($device = $this->device()){
            return view('admin.aircrafts.index', [
                'aircrafts' =>$this->getRepository()->findBy(['user'=>\Auth::user()])
            ]);
        }



    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|StandRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Aircraft::class);
    }

    public function create()
    {
        if($device = $this->device()){
            return view('admin.aircrafts.form', [
                'stands' =>$this->infoService->get(InfoService::DATA_TYPE_FORM_STANDS),
            ]);
        }

        \Session::flash('danger', 'First plspick up device ');
        return redirect('admin/userdevice/');

    }

    public function edit($id)
    {
        $aircraft = null;
        if ($id && (!$aircraft = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }
        return view('admin.aircrafts.form', ['aircraft' => $aircraft]);
    }


    public function update(Request $request, $id)
    {
        $aircraft = null;
        if ($id && (!$aircraft = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        $this->validate($request, $this->getValidationRules($id)['create']);
        $aircraft->hydrate($request->all());
        \Session::flash('success', 'Aircraft was successfully updated');
        \EntityManager::flush($aircraft);
        return redirect($this->redirect);

    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'aircraft' =>
                    'required|min:2' . $id,
            ]
        ];
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->getValidationRules()['create']);

        $aircraft = new Aircraft();
        $aircraft->hydrate($request->all());

        $aircraft->setUser(\Auth::user());
        $aircraft->setAdded(new \DateTime($request->get('added')));

        $device = \EntityManager::getRepository(Device::class) ->findOneBy(['user' => \Auth::user()]);
$aircraft->setDevice($device);

        \Session::flash('success', 'Aircraft was successfully created');
        \EntityManager::persist($aircraft);
        \EntityManager::flush();

        return redirect($this->redirect);
    }
    public function show($id)
    {
        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        $item = $this->getRepository()->find($id);

        if (!$item) {
            throw new EntityNotFoundException(sprintf('Aircraft with id %s not found', $id));
        }
        if(\EntityManager::getRepository(Raport::class)->findOneBy(['tail'=>$item])) {
            \Session::flash('danger', 'Pls first delete all raports');
            return redirect()->back();
        }


        \EntityManager::remove($item);
        \EntityManager::flush();

        \Session::flash('success', 'Aircraft was successfully deleted');
        return redirect()->back();
    }


}