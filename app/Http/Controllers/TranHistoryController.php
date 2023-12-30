<?php

namespace App\Http\Controllers;

use App\Models\TranHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class TranHistoryController extends Controller
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
        $TranHistory = TranHistory::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Kategori created',
            'data' => [
                'TranHistory' => $TranHistory
            ]
        ]);
    }

    public function getAll()
    {
        $TranHistory = TranHistory::all();
        if (!$TranHistory) {
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
                    'TranHistory' => $TranHistory
                ]
            ]
        );
    }

    public function getid($id_account)
    {
        $TranHistory = TranHistory::find($id_account);

        if (!$TranHistory) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'TranHistory' => $TranHistory
            ]
        ]);
    }

    public function update(Request $request, $id_account)
    {
        $TranHistory = TranHistory::find($id_account);

        if (!$TranHistory) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $TranHistory->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'TranHistory' => $TranHistory
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $TranHistory = TranHistory::find($request->id_account);

        if (!$TranHistory) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $TranHistory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
