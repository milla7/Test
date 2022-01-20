<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\ComunneRule;
use App\Traits\LogTrait;

class FindCustomerPostRequest extends FormRequest
{
    use LogTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' => 'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->saveLog([
                "action" => 'find-customer',
                "status" => false,
                "data" => 'Errors in validations ',
                "id_user" => auth('sanctum')->user()->id
            ]);
        $errors = ( new ValidationException( $validator) )->errors();
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $errors,
            ], 400)
        );
    }
    
}
