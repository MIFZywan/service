<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class FeedsController extends Controller
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
        $Feeds = Feeds::with('karyawan')->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Data created',
            'data' => [
                'Feeds' => $Feeds
            ]
        ]);
    }

    public function getAll()
    {
        $Feeds = Feeds::with('karyawan')->get();
        if (!$Feeds) {
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
                    'Feeds' => $Feeds
                ]
            ]
        );
    }

    public function getid($id_feed)
    {
        $Feeds = Feeds::with('karyawan')->find($id_feed);

        if (!$Feeds) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'Feeds' => $Feeds
            ]
        ]);
    }

    public function update(Request $request, $id_feed)
    {
        $Feeds = Feeds::with('karyawan')->find($id_feed);

        if (!$Feeds) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Feeds->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'Feeds' => $Feeds
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Feeds = Feeds::find($request->id_feed);

        if (!$Feeds) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Feeds->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
