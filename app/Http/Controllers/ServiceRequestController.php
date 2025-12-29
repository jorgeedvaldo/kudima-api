<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $requests = ServiceRequest::with(['client', 'professional', 'category'])
            ->where(function ($q) use ($user) {
                $q->where('client_id', $user->id)
                  ->orWhere('professional_id', $user->id);
            })
            ->latest()
            ->get();

        return response()->json($requests);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professional_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'scheduled_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $serviceRequest = ServiceRequest::create([
            'client_id' => $request->user()->id,
            'professional_id' => $request->professional_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => 'pending',
            'scheduled_at' => $request->scheduled_at,
        ]);

        return response()->json($serviceRequest, 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:accepted,rejected,completed,cancelled'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $serviceRequest = ServiceRequest::findOrFail($id);
        $user = $request->user();

        // Authorization check
        if ($serviceRequest->client_id !== $user->id && $serviceRequest->professional_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Specific logic: Professionals accept/reject, Clients/Professionals complete/cancel?
        // Simplifying rule: verify simple role logic or just allow update if involved.
        // Rule:
        // - Professional can: accept, reject, complete (maybe)
        // - Client can: cancel, complete (confirmation)
        
        $serviceRequest->update(['status' => $request->status]);

        return response()->json($serviceRequest);
    }
}
