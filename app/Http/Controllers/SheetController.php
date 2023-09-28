<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSheet;
use App\Http\Resources\Sheet as ResourcesSheet;
use App\Models\Sheet;
use App\Http\Services\GoogleSheetService;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => ResourcesSheet::collection(Sheet::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSheet $request)
    {
        $sheet_data = $request->only(['name', 'phone', 'description']);
        $url = GoogleSheetService::createSheet($sheet_data['name']);

        $sheet = Sheet::create([
            'name' => $sheet_data['name'],
            'phone' => $sheet_data['phone'],
            'description' => $sheet_data['description'],
            'url' => $url
        ]);
        return response()->json([
            'status' => true,
            'data' => new ResourcesSheet($sheet)
        ]);
    }
}
