<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 05/01/2017
 * Time: 10:24
 */

namespace App\Http\Traits;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait RequestValidator
{
    /**
     * @param Request $request
     * @param array $errors
     *
     * @return $this
     */
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return redirect()->back()
            ->withInput($request->input())
            ->withErrors($errors);
    }

    /**
     * @param array $errors
     * @param null $key
     *
     * @return array
     */
    protected function formatValidatorErrors(array $errors, $key = null)
    {
        $messages = [];

        if (!empty($errors)) {
            foreach ($errors as $error) {
                $messages[] = str_replace('The ', 'The '. $key . ' ', $error);
            }
        }

        return $messages;
    }

    /**
     * @param Request $request
     * @param array $rules
     * @param string $key
     *
     * @return \Illuminate\Validation\Validator
     * @throws ValidationException
     */
    public function validateRequestArray(Request $request, array $rules, string $key = null)
    {
        if ($request->has($key)) {
            $validator = \Validator::make($request[$key], $rules);

            if ($validator->fails()) {
                throw new ValidationException($validator, $this->buildFailedValidationResponse(
                    $request, $this->formatValidatorErrors($validator->errors()->all(), $key)
                ));
            }

            return $validator;
        }

        throw new \InvalidArgumentException(sprintf('Could not find key %s in request', $key));
    }
}