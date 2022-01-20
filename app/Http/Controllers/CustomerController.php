<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerPostRequest;
use App\Models\Customer;
use DateTime;
use App\Http\Requests\FindCustomerPostRequest;
use App\Http\Requests\DeleteCustomerPostRequest;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    use LogTrait;

    public function create( CustomerPostRequest $request ){
    	$customer = Customer::create([
    		"dni" => $request->dni,
    		"email" => $request->email,
    		"name" => $request->name,
    		"last_name" => $request->last_name,
    		"address" => $request->address,
    		"id_reg" => $request->id_reg,
    		"id_com" => $request->id_com,
    		"date_reg" => new DateTime
    	]);

        $this->saveLog([
            "action" => 'create-customer',
            "status" => true,
            "data" => 'Customer created with email: ' . $request->email,
            "id_user" => auth('sanctum')->user()->id
        ]);

    	return response()->json([
    		'success' => true,
    		'data' => 'the customer has created.'
    	]);
    }

    public function find( FindCustomerPostRequest $request ){
    	$customer = Customer::where( 'dni', $request->search )
    				->orWhere( 'email', $request->search )
    				->where( 'status', 'A' )
    				->first();

        $this->saveLog([
            "action" => 'find-customer',
            "status" => true,
            "data" => 'Costumer finded with param: ' . $request->search, 
            "id_user" => auth('sanctum')->user()->id
        ]);

        if(!$customer){
            return response()->json([
                "success" => true,
                "data" => "no results found"
            ]);
        }
    	return response()->json([
    		"success" => true,
    		"data" => [
                "costumer" => [
                    "name" => $customer->name,
                    "last_name" => $customer->last_name,
                    "address" => $customer->address,
                    "region_description" => $customer->region->description,
                    "commune_description" => $customer->commune->description
                ]
            ]
    	]);
    }

    public function delete( DeleteCustomerPostRequest $request ){
        $customer = Customer::where( 'dni', $request->dni )->whereIn( 'status', [ 'A', 'I' ] )->first();
        if(!$customer){
            $this->saveLog([
                "action" => 'delete-customer',
                "status" => true,
                "data" => 'Customer already deleted with dni: ' . $request->dni,
                "id_user" => auth('sanctum')->user()->id
            ]);
            return response()->json([
                "success" => true,
                "data" => 'the registry does not exist'
            ]);
        }
        $customer->status == 'A' ? $customer->status = 'I' : $customer->status = 'trash';
        $customer->save();
        $this->saveLog([
                "action" => 'delete-customer',
                "status" => true,
                "data" => 'Customer deleted with dni: ' . $request->dni,
                "id_user" => auth('sanctum')->user()->id
            ]);
        return response()->json([
            "success" => true,
            "data" => "the customer has been deleted"
        ]);
    }
}
