<?php

namespace App\Http\Controllers\Admin;


use App\Entity\Aircraft;
use App\Entity\Country;
use App\Entity\Raport;
use App\Entity\Repository\UserRepository;
use App\Entity\Stand;
use App\Entity\Status;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;

class RaportsController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/raports';


    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        return view('admin.raports.index', [
            'items' => $this->getRepository()->findAll()
        ]);
    }

    public function show($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('Raport with id %s not found', $id));
        }

        var_dump($item);
        die();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|UserRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Raport::class);
    }

    public function create()
    {
        return view('admin.raports.form', [
            'item' => null,
            'aircrafts' => $this->infoService->get(InfoService::DATA_TYPE_FORM_AIRCRAFTS),
            'stands' => $this->infoService->get(InfoService::DATA_TYPE_FORM_STANDS),
            'statuses' => $this->infoService->get(InfoService::DATA_TYPE_FORM_STATUS),
        ]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }
        return view('admin.raports.form', [
            'item' => $item,
            'aircrafts' => $this->infoService->get(InfoService::DATA_TYPE_FORM_AIRCRAFTS),
            'stands' => $this->infoService->get(InfoService::DATA_TYPE_FORM_STANDS),
            'statuses' => $this->infoService->get(InfoService::DATA_TYPE_FORM_STATUS),
        ]);
    }


    public function update(Request $request, $id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        $this->validate($request, $this->getValidationRules($id)['create']);
        $item->setEta($request->get('eta'))
            ->setComment($request -> get('comment')  )
            ->setUser(\Auth::user())
            ->setStand(\EntityManager::getRepository(Stand::class)->find($request->get('stand')))
            ->setTail(\EntityManager::getRepository(Aircraft::class)->find($request->get('tail')))
            ->setStatus(\EntityManager::getRepository(Status::class)->find($request->get('status')));


        \Session::flash('success', 'Raport was successfully updated');
        \EntityManager::flush($item);
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

    public function store(Request $request)
    {
        $this->validate($request, $this->getValidationRules()['create']);


        $item = new Raport();
        $item->setEta($request->get('eta'))
            ->setComment($request -> get('comment')  )
            ->setUser(\Auth::user())
            ->setStand(\EntityManager::getRepository(Stand::class)->find($request->get('stand')))
            ->setTail(\EntityManager::getRepository(Aircraft::class)->find($request->get('tail')))
            ->setStatus(\EntityManager::getRepository(Status::class)->find($request->get('status')));




        \Session::flash('success', 'Raport was successfully created');
        \EntityManager::persist($item);
        \EntityManager::flush();

        return redirect($this->redirect);
    }


    public function destroy($id)
    {
        $user = $this->getRepository()->find($id);

        if (!$user) {
            throw new EntityNotFoundException(sprintf('Raport with id %s not found', $id));
        }

        \EntityManager::remove($user);
        \EntityManager::flush();

        \Session::flash('success', 'Raport was successfully deleted');
        return redirect()->back();
    }

}