<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;

class KomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komputers = Komputer::all();
        return response()->json($komputers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'merk' => 'required|string',
            'preosesor' => 'required|string',
            'ram' => 'required|string',
            'penyimpanan' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        if (!$validated) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data Ra Valid',
                    'data' => null
                ],
            400);
        } else {
            $komputers = Komputer::create($validated);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Wes Ketambah',
                    'data' => $komputers
                ],
            201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komputers = Komputer::find($id);
        if ($komputers) {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Komputer Ketemu!!',
                    'data' => $komputers
                ],
            200);
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data Ra Ketemu!',
                    'data' => null
                ],
            404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komputers = Komputer::find($id);
        if (!$komputers) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data Komputer Ra Ketemu',
                    'data' => null
                ],
            404);
        }
        $validated = $request->validate([
            'merk' => 'sometimes|required|string',
            'preosesor' => 'sometimes|required|string',
            'ram' => 'sometimes|required|string',
            'penyimpanan' => 'sometimes|required|string',
            'harga' => 'sometimes|required|numeric',
        ]);

        $komputers->update($validated);
        return response()->json(
            [
                'status' => true,
                'message' => 'Data Komputer Wes Keubah',
                'data' => $komputers
            ],
        200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komputers = Komputer::find($id);
        if ($komputers) {
            $komputers->delete();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Sukses Dihapus y',
                    'data' => null
                ],
            200);
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data Ra Ketemu',
                    'data' => null
                ],
            404);
        }
    }
}