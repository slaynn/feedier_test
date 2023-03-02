<?php

namespace App\Jobs;

use App\Mail\WeeklyImportReportEmail;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WeeklyImportedFeedbackReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $feedbacks = Feedback::imported()
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->get()->toJson();
        Mail::to(User::admin()->first()->email)->send(new WeeklyImportReportEmail($feedbacks));

    }
}
