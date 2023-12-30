<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class TasksController extends Controller
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
        $Tasks = Tasks::with(['karyawan','project'])->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Data created',
            'data' => [
                'tasks' => $Tasks
            ]
        ]);
    }

    public function getAll()
    {
        $Tasks = Tasks::with(['karyawan','project'])->get();
        if (!$Tasks) {
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
                    'tasks' => $Tasks
                ]
            ]
        );
    }

    public function getid($id)
    {
        $Tasks = Tasks::with(['karyawan','project'])->find($id);

        if (!$Tasks) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'tasks' => $Tasks
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $Tasks = Tasks::with(['karyawan','project'])->find($id);

        if (!$Tasks) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Tasks->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'tasks' => $Tasks
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Tasks = Tasks::find($request->id);

        if (!$Tasks) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Tasks->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
