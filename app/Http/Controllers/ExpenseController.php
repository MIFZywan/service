<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class ExpenseController extends Controller
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
        $expenses = Expense::with('akun')->get();

        if (!$expenses) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'All data grabbed',
            'data' => [
                'expense'=> $expenses
            ]
        ]);
        // $expenses = Expense::with('akun')->get();

        // if ($expenses->isEmpty()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'No data found',
        //         'data' => null
        //     ], 404);
        // }

        // $expenseData = [];

        // foreach ($expenses as $expense) {
        //     $expenseData[] = [
        //         'id_expense' => $expense->id_expense,
        //         'username' => $expense->akun->username,
        //         'expense_name' => $expense->expense_name,
        //         'date' => $expense->date,
        //         'total_expense' => $expense->total_expense,
        //     ];
        // }

        // return response()->json([
        //     'success' => true,
        //     'message' => 'All data grabbed',
        //     'data' => $expenseData
        // ]);
    }

    public function getid($id_expense)
    {
        $Expense = Expense::with('akun')->find($id_expense);

        if (!$Expense) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'expense' => $Expense
            ]
        ]);
        // $Expense = Expense::with('akun')->find($id_expense);

        // if (!$Expense) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Data not found',
        //         'data' => null
        //     ], 404);
        // }

        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'id_expense' => $Expense->id_expense,
        //         'username' => $Expense->akun->username,
        //         'expense_name' => $Expense->expense_name,
        //         'date' => $Expense->date,
        //         'total_expense' => $Expense->total_expense,
        //     ]
        // ]);
    }
    public function create(Request $request)
    {

        $Expense = Expense::with('akun')->create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'New Kategori created',
            'data' => [
                'expense' => $Expense
            ]
        ]);
    }
    public function update(Request $request, $id_expense)
    {
        $Expense = Expense::with('akun')->find($id_expense);

        if (!$Expense) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Expense->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'expense' => $Expense
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Expense = Expense::find($request->id_expense);

        if (!$Expense) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Expense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }

}
