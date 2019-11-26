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
use App\Entity\Raport;
use App\Entity\Repository\UserRepository;
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

    public function index()
    {

        return view('admin.aircrafts.index', [
            'aircrafts' => $this->getRepository()->findAll()
        ]);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|UserRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Aircraft::class);
    }

    public function create()
    {
        return view('admin.aircrafts.form', ['aircraft' => null]);
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
                'acReg' =>
                    'required|min:3|unique:App\Entity\Aircraft,acReg,' . $id,
            ]
        ];
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->getValidationRules()['create']);

        $aircraft = new Aircraft();
        $aircraft->hydrate($request->all());

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