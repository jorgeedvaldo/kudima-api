<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalProfile;
use App\Models\Review;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_request_id' => 'required|exists:service_requests,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $serviceRequest = ServiceRequest::findOrFail($request->service_request_id);

        if ($serviceRequest->status !== 'completed') {
            return response()->json(['message' => 'Service request must be completed to review'], 400);
        }

        if ($serviceRequest->client_id !== $request->user()->id) {
            return response()->json(['message' => 'Only the client can review the service'], 403);
        }

        // Check if already reviewed
        if (Review::where('service_request_id', $serviceRequest->id)->exists()) {
            return response()->json(['message' => 'Service already reviewed'], 400);
        }

        $review = Review::create([
            'service_request_id' => $serviceRequest->id,
            'reviewer_id' => $request->user()->id,
            'reviewee_id' => $serviceRequest->professional_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Update professional average rating
        $this->updateProfessionalRating($serviceRequest->professional_id);

        return response()->json($review, 201);
    }

    private function updateProfessionalRating($professionalId)
    {
        $average = Review::where('reviewee_id', $professionalId)->avg('rating');
        
        ProfessionalProfile::where('user_id', $professionalId)->update([
            'average_rating' => $average
        ]);
    }
}
