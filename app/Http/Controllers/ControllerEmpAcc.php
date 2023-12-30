<?php

namespace App\Http\Controllers;
use App\Models\EmployeeAccount;
use Illuminate\Http\Request;

class ControllerEmpAcc extends Controller
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

    public function read($karyawan_nip = null)
{
    if ($karyawan_nip) {
        $employeeAccount = EmployeeAccount::where('karyawan_nip', $karyawan_nip)->first();

        if (!$employeeAccount) {
            return response()->json([
                'success' => false,
                'message' => 'Employee account not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'employee_account' => $employeeAccount
            ]
        ]);
    } else {
        $employeeAccounts = EmployeeAccount::all();

        return response()->json([
            'success' => true,
            'data' => [
                'employee_accounts' => $employeeAccounts
            ]
        ]);
    }
}

public function create(Request $request)
    {
        $employeeAccount = employeeAccount::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New account created',
            'data' => [
                'employeeAccount' => $employeeAccount
            ]
        ], 201);
    }
}