<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('professional_id')) {
            $query->whereHas('professionals', function ($q) use ($request) {
                $q->where('users.id', $request->professional_id);
            });
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Return services with their category. 
        // If specific professional data (price) is needed, it should be requested via a different endpoint or handled differently,
        // but for now this restores functionality.
        return response()->json($query->with(['category'])->get());
    }
}
