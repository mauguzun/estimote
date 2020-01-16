<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Country;
use App\Entity\Device;
use App\Entity\Raport;
use App\Entity\Stand;
use App\Entity\UserDevice;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;


class DevicesController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/devices';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        return view('admin.devices.index', [
            'stands' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|Device
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Device::class);
    }

    public function create()
    {
        return view('admin.devices.form', ['stand' => null]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }
        return view('admin.devices.form', ['stand' => $item]);
    }


    public function update(Request $request, $id)
    {
        $aircraft = null;
        if ($id && (!$aircraft = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        $this->validate($request, $this->getValidationRules($id)['edit']);
        $aircraft->hydrate($request->all());
        \Session::flash('success', 'Device was successfully updated');
        \EntityManager::flush($aircraft);

        return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'device_identifier' => 'required|min:4',
                'api_url' => 'required|min:4',

            ],
            'edit' => [
                'api_url' => 'required|min:4',

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

        try {
            \EntityManager::flush();
            \Session::flash('success', 'Device was successfully created');
        } catch (\Exception $e) {
            \Session::flash('danger', $e->getMessage());
        }


        return redirect($this->redirect);
    }

    public function destroy($id)
    {


        $item = $this->getRepository()->find($id);
        $deviceRep =  \EntityManager::getRepository(UserDevice::class);


        if (!$item) {
            // throw new EntityNotFoundException(sprintf('Apron with id %s not found', $id));
            \Session::flash('danger', 'Item not exist');
        } else {

            $devices = $deviceRep->findBy(['device'=>$item]);
            foreach ($devices as $device){
                \EntityManager::remove($device);

            }
            \EntityManager::flush();

            \EntityManager::flush();
            \Session::flash('danger', 'This also removed all history with this device id !');

        }

        \EntityManager::remove($item);
        \EntityManager::flush();

        \Session::flash('success', 'Stand was successfully deleted');
        return redirect()->back();
    }


}
