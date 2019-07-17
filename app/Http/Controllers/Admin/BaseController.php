<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 08/12/2016
 * Time: 14:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Traits\JsonResponses;

abstract class BaseController extends Controller
{
    use JsonResponses;

    abstract protected function getRepository();

    abstract protected function getValidationRules($id = null): array;

    protected function getTransformer()
    {
        return;
    }

    abstract protected function setBreadCrumbs($id = null): array;
}