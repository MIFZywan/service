<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class EventController extends Controller
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
        $Event = Event::with('karyawan')->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Data created',
            'data' => [
                'Event' => $Event
            ]
        ]);
    }

    public function getAll()
    {
        $Event = Event::with('karyawan')->get();
        if (!$Event) {
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
                    'Event' => $Event
                ]
            ]
        );
    }

    public function getid($id_event)
    {
        $Event = Event::with('karyawan')->find($id_event);

        if (!$Event) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'Event' => $Event
            ]
        ]);
    }

    public function update(Request $request, $id_event)
    {
        $Event = Event::with('karyawan')->find($id_event);

        if (!$Event) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Event->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'Event' => $Event
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Event = Event::find($request->id_event);

        if (!$Event) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
