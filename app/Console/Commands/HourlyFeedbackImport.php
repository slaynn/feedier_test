<?php

namespace App\Console\Commands;

use App\Jobs\WeeklyImportedFeedbackReport;
use App\Services\FeedbackImportService;
use Illuminate\Console\Command;

class HourlyFeedbackImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedbackImport:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import feedbacks every hours from cdv file';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        (new FeedbackImportService())->import();
    }
}
