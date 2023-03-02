<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStoreRequest;
use App\Models\Feedback;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request)
    {
        $data = $request->validated();
        return Feedback::create([
            'comment' => $data['comment'],
            'start_date' => Carbon::now(),
            'source' => 'webApp'
        ]);
    }
}
