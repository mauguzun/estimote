<?php

namespace App\Http\Controllers\Api;

use App\Entity\Beacon;
use App\Http\Controllers\Admin\BaseController;
use App\Services\InfoService;
use Illuminate\Http\Request;
use Sorskod\Larasponse\Larasponse;
use Validator;

class BeaconController extends BaseController
{

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    public function index()
    {
        return response(json_encode([1, 2, 3]), 201);
    }

    public function store(Request $request)
    {


        $item = $request->json()->all();

        $validator = Validator::make($item, $this->getValidationRules());

        if (!$validator->passes()) {
            return response(json_encode($validator->errors()->all()), 400);
        }

        $beacon = new Beacon();
        $beacon->hydrate($request->json()->all());
        \EntityManager::persist($beacon);
        \EntityManager::flush();


        return response(json_encode($item), 201);

    }

    protected function getValidationRules($id = null): array
    {

        return [
            'ts' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ];
    }


    protected function getRepository()
    {
        return \EntityManager::getRepository(Beacon::class);
    }
}
