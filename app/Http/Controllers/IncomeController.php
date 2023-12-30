<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class IncomeController extends Controller
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


    public function getAll()
    {
        $Income = Income::with('akun')->get();
        if (!$Income) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }
        // $IncomeData = [];
        // foreach($Income as $data){
        //     $IncomeData[]=[
        //         'id_income'=> $data->$id_income,
        //         'username'=> $data->akun->username,
        //         'income_name'=> $data->$income_name,
        //         'date'=> $data->$date,
        //         'total_income'=> $data->$total_income
        //     ];
        // }
        return response()->json(
            [
                'success' => true,
                'message' => 'All Data grabbed',
                'data' => [
                    'income' => $Income
                ]
            ]
        );
    }

    public function getid($id_income)
    {
        $Income = Income::with('akun')->find($id_income);

        if (!$Income) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'income' => $Income
            ]
        ]);
    }
    public function create(Request $request)
    {
        $Income = Income::with('akun')->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Kategori created',
            'data' => [
                'income' => $Income
            ]
        ]);
    }
    public function update(Request $request, $id_income)
    {
        $Income = Income::with('akun')->find($id_income);

        if (!$Income) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Income->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'income' => $Income
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Income = Income::find($request->id_income);

        if (!$Income) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Income->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }

}
