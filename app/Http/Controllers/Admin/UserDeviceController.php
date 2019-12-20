<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Country;
use App\Entity\Device;
use App\Entity\Raport;
use App\Entity\UserDevice;
use App\Services\InfoService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;


class UserDeviceController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/userdevice';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();


    }

    public function index()
    {


        return view('admin.userdevice.index', [
            'stands' => $this->getRepository()->findBy(['user' => \Auth::user()]),
            'in_use' => $this->getRepository()->findOneBy(['user' => \Auth::user(), 'stop' => null]),
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


    public function update()
    {
        return redirect($this->redirect);
    }

    public function show($id)
    {
        return redirect($this->redirect);
    }

    public function store(Request $request)
    {


        $id = $request->get('device_identifier');
        $deviceRepo = \EntityManager::getRepository(Device::class);
        $device = $deviceRepo->find($id);
        $device->setUser(\Auth::user());

        $userDevice = new UserDevice();
        $userDevice->setUser(\Auth::user())->setDevice($device);

        \EntityManager::persist($device);
        \EntityManager::persist($userDevice);
        \EntityManager::flush();


        return redirect($this->redirect);
    }

    public function destroy($id)
    {

        $userDevice = $this->getRepository()->find($id);
        if ($userDevice) {
            $userDevice->setStop(new \DateTime());

            $deviceRepo = \EntityManager::getRepository(Device::class);
            $device = $deviceRepo->find($userDevice->getDevice()->getId());
            $device->setUser(null);

            \Session::flash('success', 'Stand dropped updated');
            \EntityManager::flush($device);
            \EntityManager::flush($userDevice);


            return redirect($this->redirect);
        }


        // $device->setStop()
        // return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'device_identifier' => 'required|min:4',
            ]
        ];
    }


}