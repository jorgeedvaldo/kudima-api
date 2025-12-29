<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'professional')->with('professionalProfile', 'professionalCategories');

        if ($request->has('category_id')) {
            $query->whereHas('professionalCategories', function ($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        return response()->json($query->get());
    }

    public function show($id)
    {
        $professional = User::where('role', 'professional')
            ->with(['professionalProfile', 'professionalCategories', 'reviewsReceived.reviewer'])
            ->findOrFail($id);

        return response()->json($professional);
    }
}
