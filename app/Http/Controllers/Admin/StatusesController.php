<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Country;
use App\Entity\Repository\UserRepository;
use App\Entity\Status;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;



class StatusesController  extends BaseController
{
    private $infoService;
    private $redirect = 'admin/statuses';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        return view('admin.statuses.index', [
            'items' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|UserRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Status::class);
    }

    public function create()
    {
        return view('admin.statuses.form', ['item' => null]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('Status with id %s not found', $id));
        }
        return view('admin.statuses.form', ['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $aircraft = null;
        if ($id && (!$aircraft = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('Status with id %s not found', $id));
        }

        $this->validate($request, $this->getValidationRules($id)['create']);
        $aircraft->hydrate($request->all());
        \Session::flash('success', 'Status was successfully updated');
        \EntityManager::flush($aircraft);
        return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'status' => 'required|min:3',

            ]
        ];
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->getValidationRules()['create']);

        $item = new Status();
        $item->hydrate($request->all());

        \Session::flash('success', 'Stand was successfully created');
        \EntityManager::persist($item);
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
            throw new EntityNotFoundException(sprintf('Status with id %s not found', $id));
        }
        if(\EntityManager::getRepository(Raport::class)->findOneBy(['status'=>$item])) {
            \Session::flash('danger', 'Pls first delete all raports');
            return redirect()->back();
        }

        \EntityManager::remove($item);
        \EntityManager::flush();

        \Session::flash('success', 'Status was successfully deleted');
        return redirect()->back();
    }


}