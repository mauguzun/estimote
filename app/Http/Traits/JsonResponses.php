<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 17/08/16
 * Time: 17:45
 */

namespace App\Http\Traits;
use League\Fractal\TransformerAbstract;
use Sorskod\Larasponse\Larasponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait JsonResponses
{
    /** @var Larasponse $fractal */
    protected $fractal;

    /**
     * RestBaseController constructor.
     * @param Larasponse $fractal
     */
    public function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * @param string $message
     * @param null $data
     * @param null $meta
     * @param TransformerAbstract|null $transformer
     * 
     * @return JsonResponse
     */
    protected function jsonSuccessResponse(
        $message = 'success', 
        $data = null, 
        $meta = null,
        TransformerAbstract $transformer = null
    )
    {
        $responseData = null;
        if(is_array($data)) {
            $responseData = $this->fractal->collection($data, $transformer ?? $this->getTransformer());
        } else if (is_object($data)) {
            $responseData['data'] = $this->fractal->item($data, $transformer ?? $this->getTransformer());
        } else {
            $responseData = [];
        }

        return $this->buildJsonResponse(JsonResponse::HTTP_OK, $responseData, $meta, null, $message);
    }

    /**
     * Json array response
     * @param string $message
     * @param array $data
     * @param mixed $meta
     * 
     * @return JsonResponse
     */
    protected function jsonArraySuccessResponse($message = 'success', array $data, $meta = null) {
        return $this ->buildJsonResponse(JsonResponse::HTTP_OK, ['data' => $data], $meta, null, $message);
    }
    
    /**
     * @param string $error
     * @param int $status
     *
     * @return JsonResponse
     */
    protected function jsonErrorResponse(string $error, int $status = JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
    {
        return $this->buildJsonResponse($status, null, null, $error);
    }

    /**
     * @param int $status
     * @param null $data
     * @param null $meta
     * @param null $error
     * @param null $successMessage
     *
     * @return JsonResponse
     */
    protected function buildJsonResponse(
        int $status,
        $data = null,
        $meta = null,
        $error = null,
        $successMessage = null
    ): JsonResponse
    {
        $response = ['status' => $status];

        if ($data != null) {
            $response['data'] = $data['data'];
        }

        if ($meta != null) {
            $response['meta'] = $meta;
        }

        if ($error != null) {
            $response['error'] = $error;
        }

        if ($successMessage != null) {
            $response['success_message'] = $successMessage;
        }

        return \Response::json($response, $status);
    }
}