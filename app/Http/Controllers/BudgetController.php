<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BudgetController extends Controller
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
        $Budget = Budget::with('akun')->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Kategori created',
            'data' => [
                'budget' => $Budget
            ]
        ]);
    }

    public function getAll()
    {
        $Budget = Budget::with('akun')->get();
        if (!$Budget) {
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
                    'budget' => $Budget
                ]
            ]
        );
    }

    public function getid($id_budget)
    {
        $Budget = Budget::with('akun')->find($id_budget);

        if (!$Budget) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'budget' => $Budget
            ]
        ]);
    }

    public function update(Request $request, $id_budget)
    {
        $Budget = Budget::with('akun')->find($id_budget);

        if (!$Budget) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Budget->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'budget' => $Budget
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Budget = Budget::find($request->id_budget);

        if (!$Budget) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Budget->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
