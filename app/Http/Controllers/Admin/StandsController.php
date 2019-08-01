<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Country;
use App\Entity\Repository\UserRepository;
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
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|UserRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(Stand::class);
    }

    public function create()
    {
        return view('admin.stands.form', ['stand' => null]);
    }

    public function edit($id)
    {
        $item = null;
        if ($id && (!$item = $this->getRepository()->find($id))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }
        return view('admin.stands.form', ['stand' => $item]);
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
                'name' => 'required|min:3',
                'latitude' => 'required|min:3',
                'longitude' => 'required|min:3',
            ]
        ];
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->getValidationRules()['create']);

        $item = new Stand();
        $item->hydrate($request->all());

        \Session::flash('success', 'Stand was successfully created');
        \EntityManager::persist($item);
        \EntityManager::flush();

        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        $user = $this->getRepository()->find($id);

        if (!$user) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $id));
        }

        \EntityManager::remove($user);
        \EntityManager::flush();

        \Session::flash('success', 'Stand was successfully deleted');
        return redirect()->back();
    }


}