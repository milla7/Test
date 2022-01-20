<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\ComunneRule;
use App\Traits\LogTrait;

class CustomerPostRequest extends FormRequest
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
            'dni' => 'required|unique:customers,dni|digits_between:5,10',
            'email' => 'required|email|unique:customers,email|max:120',
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:45',
            'last_name' => 'required|regex:/^[a-zA-Z ]+$/|max:45',
            'address' => 'nullable|max:255',
            'id_reg' => 'required|exists:regions',
            'id_com' => [ 'required', 'exists:communes', new ComunneRule( $this->id_com, $this->id_reg ) ],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->saveLog([
                "action" => 'create-customer',
                "status" => false,
                "data" => 'Errors validations ',
                "id_user" => auth('sanctum')->user()->id
            ]);
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $errors,
            ], 400)
        );
    }
    
}
