<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Apron;
use App\Entity\Country;
use App\Entity\Raport;
use App\Entity\Repository\StandRepository;
use App\Entity\Stand;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;


class ApronsController extends BaseController
{
    private $infoService;
    private $redirect = 'admin/aprons';

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {

        return view('admin.aprons.index', [
            'stands' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|StandRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Apron::class);
    }

    public function create()
    {
        return view('admin.aprons.form', ['stand' => null]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }
        return view('admin.aprons.form', ['stand' => $item]);
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
                'title' => 'required|min:1',

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

        $item = new Apron();
        $item->hydrate($request->all());


        \Session::flash('success', 'Apron was successfully created');
        \EntityManager::persist($item);
        \EntityManager::flush();

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