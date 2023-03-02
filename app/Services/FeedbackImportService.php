<?php

namespace App\Services;

use App\Imports\FeedbackImport;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class FeedbackImportService
{

    public function import()
    {
        $path = "https://feedier-prod-europe.s3.eu-west-1.amazonaws.com/special/Reviews+Import.csv";
        $file_name = '/import/import' . '_' . time() . '.csv';
        Storage::disk('local')->put($file_name, file_get_contents($path));
        $url = Storage::path($file_name);
        $file = fopen($url, 'r');

        $i = 0;

        try {
            while (($csvLine = fgetcsv($file, null, ',')) !== false) {
                // Skip first row (Remove below comment if you want to skip the first row)
                if ($i == 0) {
                    $i++;
                    continue;
                }
                Feedback::firstOrcreate([
                    "comment" => trim($csvLine[0]),
                    "rating" => trim($csvLine[1]),
                    "start_date" => Carbon::parse($csvLine[2]),
                    "source" => trim($csvLine[5])
                    ],
                    [
                        "comment" => trim($csvLine[0]),
                        "rating" => trim($csvLine[1]),
                        "start_date" => Carbon::parse($csvLine[2]),
                        "target" => json_encode([
                            'address' => trim($csvLine[3]),
                            'appartments' => trim($csvLine[4])
                        ]),
                        "source" => trim($csvLine[5])
                    ]
                );


                $i++;
            }
            fclose($file);
            Storage::delete($file_name);

        } catch (Exception $e) {
            fclose($file);
            report($e);
        }


    }
}
