<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function read($customer_id = null)
    {
        if ($customer_id) {
            $customer = Customer::find($customer_id);

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer not found',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'customer' => $customer
                ]
            ]);
        } else {
            $customers = Customer::all();

            return response()->json([
                'success' => true,
                'data' => [
                    'customers' => $customers
                ]
            ]);
        }
    }
}