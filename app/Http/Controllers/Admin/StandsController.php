<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Country;
use App\Entity\Raport;
use App\Entity\Report;
use App\Entity\Repository\StandRepository;
use App\Entity\Stand;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;


class StandsController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/stands';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        return view('admin.stands.index', [
            'stands' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|StandRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Stand::class);
    }

    public function create()
    {
        return view('admin.stands.form', [
            'stand' => null,
            'aprons' => $this->infoService->get(InfoService::DATA_TYPE_FORM_APRONS),
        ]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        return view('admin.stands.form', [
            'stand' => $item,
            'aprons' => $this->infoService->get(InfoService::DATA_TYPE_FORM_APRONS),
        ]);
    }


    public function update(Request $request, $id)
    {


        $aircraft = null;
        if ($id && (!$aircraft = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        $this->validate($request, $this->getValidationRules($id)['create']);
        if (!$request->get('apron')) {
            $request->request->remove('apron');
        }

        $aircraft->hydrate($request->all());

        \Session::flash('success', 'Stand was successfully updated');
        \EntityManager::flush($aircraft);
        return redirect($this->redirect);
    }

    protected function getValidationRules($id = null): array
    {

        return [
            'create' => [
                'name' => 'required|min:1',
                'latitude' => 'required|min:3',
                'longitude' => 'required|min:3',
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

        $item = new Stand();
        if (!$request->get('apron')) {
            $request->request->remove('apron');
        }

        $item->hydrate($request->all());


        \Session::flash('success', 'Stand was successfully created');
        \EntityManager::persist($item);
        \EntityManager::flush();

        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        $item = $this->getRepository()->find($id);

        if (!$item) {
            throw new EntityNotFoundException(sprintf('Stand with id %s not found', $id));
        }
        if (\EntityManager::getRepository(Report::class)->findOneBy(['stand' => $item])) {
            \Session::flash('danger', 'Pls first delete all reports with stands');
            return redirect()->back();
        }

        \EntityManager::remove($item);
        \EntityManager::flush();

        \Session::flash('success', 'Stand was successfully deleted');
        return redirect()->back();
    }


}