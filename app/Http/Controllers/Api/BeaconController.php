<?php

namespace App\Http\Controllers\Api;

use App\Entity\Beacon;
use App\Entity\Device;
use App\Entity\Log;
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


        $device = \EntityManager::getRepository(Device::class);
        $devices = $device->findAll();

        $beacon = \EntityManager::getRepository(Beacon::class);
        $log = \EntityManager::getRepository(Log::class);


        foreach ($devices as $dev) {
            for ($i = 1; $i < 4; $i++) {

                $response = $this->apiRequest($dev->getApiId(), $i);

                $saved = 0;
                $total = 0;
                $deviceId = '';

                if ($response && $object = json_decode($response)) {
                    $total = $object->meta->total;

                    foreach ($object->data as $row) {

                        $test = [
                            'enqueuedAt' => new  \DateTime($row->enqueued_at),
                            'deviceIdentifier' => $row->device_identifier,
                            'appId' => $row->app_id,
                        ];
                        $deviceId = $row->device_identifier;

                        if (!$beacon->findOneBy($test)) {
                            $saved++;
                            $new = new Beacon();


                            $new->setAppId($row->app_id)
                                ->setDeviceIdentifier($row->device_identifier)
                                ->setEnqueuedAt($test['enqueuedAt'])
                                ->setTs($row->payload->ts)
                                ->setLat($row->payload->lat)
                                ->setLong($row->payload->long)
                                ->setPrec($row->payload->prec)
                                ->setDiff($row->payload->diff)
                                ->setHead($row->payload->head)
                                ->setSpeed($row->payload->speed)
                                ->setDiff($row->payload->diff)
                                ->setSats($row->payload->sats);
                            \EntityManager::persist($new);
                        }
                    }
                    echo $saved.'/' .$dev->getApiId(). '/'.$deviceId."<br>";

                }
                $log = new  Log();
                $log->setTotal($total)->setSaved($saved)->setApiId($dev->getApiId())->setDeviceIdentifier($deviceId);
                \EntityManager::persist($log);
                \EntityManager::flush();

            }
        }

    }

    /**
     * @param string $appId
     * @param int $pageNum
     * @return bool|string
     */
    private function apiRequest(string $appId, $pageNum = 1)
    {
        $ch = curl_init('https://cloud.estimote.com/v3/lte/device_events?app_id=' . $appId . '&page=' . $pageNum . '&type=position-change');
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic ' . base64_encode("jean-marc-urbani-s-your-ow-mkr:5dbd07ab9494ec7e8bf30ee5db47151b")
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
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

    protected function getValidationRules(
        $id = null
    ): array {

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
