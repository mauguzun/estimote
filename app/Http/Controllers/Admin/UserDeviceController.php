<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Apron;
use App\Entity\Country;
use App\Entity\Device;
use App\Entity\Raport;
use App\Entity\Repository\StandRepository;
use App\Entity\Stand;
use App\Entity\UserDevice;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;


class UserDeviceController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/UserDevice';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        //dd(\Auth::user()->getId());
        return view('admin.userdevice.index', [
            'stands' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|Device
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(UserDevice::class);
    }

    public function create()
    {

        return view('admin.userdevice.form', [
            'stand' => null,
            'devices' => $this->infoService->get(InfoService::DATA_TYPE_FORM_DEVICES),
        ]);
    }

    public function edit($id)
    {
        return redirect($this->redirect);
    }


    public function update(Request $request, $id)
    {
        return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'device_identifier' => 'required|min:4',
            ]
        ];
    }

    public function show($id)
    {
        return redirect($this->redirect);
    }

    public function store(Request $request)
    {


        $this->validate($request, $this->getValidationRules()['create']);

        $item = new Device();

        $item->hydrate($request->all());


        \EntityManager::persist($item);

        $metadata = \EntityManager::getClassMetaData(get_class($item));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);

        try{
            \EntityManager::flush();
            \Session::flash('success', 'Device was successfully created');
        }
        catch (\Exception $e){
            \Session::flash('danger', $e->getMessage());
        }


        return redirect($this->redirect);
    }

    public function destroy($id)
    {


        $item = $this->getRepository()->find($id);

        if (!$item ) {
            // throw new EntityNotFoundException(sprintf('Apron with id %s not found', $id));
            \Session::flash('danger', 'Item not exist');
        }
        else if (\EntityManager::getRepository(Stand::class)->findByApron($item)) {
            \Session::flash('danger', 'Pls first delete all stands based with apron ');
            return redirect()->back();
        }

        \EntityManager::remove($item);
        \EntityManager::flush();

        \Session::flash('success', 'Stand was successfully deleted');
        return redirect()->back();
    }


}