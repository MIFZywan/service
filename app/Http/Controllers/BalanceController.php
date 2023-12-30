<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BalanceController extends Controller
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
    public function create(Request $request)
    {
        $Balance = Balance::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Data created',
            'data' => [
                'Balance' => $Balance
            ]
        ]);
    }

    public function getAll()
    {
        $Balance = Balance::all();
        if (!$Balance) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'All Data grabbed',
                'data' => [
                    'Balance' => $Balance
                ]
            ]
        );
    }

    public function getid($account_number)
    {
        $Balance = Balance::find($account_number);

        if (!$Balance) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'Balance' => $Balance
            ]
        ]);
    }

    public function update(Request $request, $account_number)
    {
        $Balance = Balance::find($account_number);

        if (!$Balance) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Balance->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'Balance' => $Balance
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Balance = Balance::find($request->account_number);

        if (!$Balance) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Balance->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
