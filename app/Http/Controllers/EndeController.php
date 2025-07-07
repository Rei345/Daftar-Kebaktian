<?php

namespace App\Http\Controllers;

use App\Models\Ende;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EndeController extends Controller
{
    public function index() 
    {
        $ende = Ende::orderByRaw('CAST(song_number AS UNSIGNED) ASC')->get();
        return view ('content.daftar-ende', compact('ende'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $page = $request->input('page', 1);
        $perPage = 10;

        $validator = Validator::make($request->all(), [
            'query' => 'nullable|string|max:100',
            'page' => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Input pencarian atau halaman tidak valid.',
                'errors' => $validator->errors()
            ], 422);
        }

        $ende = Ende::query();

        if ($query) {
            $ende->where(function ($q) use ($query) {
                if (is_numeric($query)) {
                    $q->orWhere('song_number', (int) $query);
                }
                $q->orWhere('song_title', 'LIKE', '%' . $query . '%');
            });
        }

        $paginatedEnde = $ende->orderByRaw('CAST(song_number AS UNSIGNED) ASC')
                                ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $paginatedEnde->items(),
            'current_page' => $paginatedEnde->currentPage(),
            'last_page' => $paginatedEnde->lastPage(),
            'total' => $paginatedEnde->total(),
            'per_page' => $paginatedEnde->perPage(),
        ]);
    }
}
