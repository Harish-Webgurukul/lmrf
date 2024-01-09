<?php

namespace App\Console\Commands;

use App\Models\Biweeklycall;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class callScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patient:callScheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Weekly Calls';

    /**
     * Execute the console command.
     * to run the command in console write php artisan patient:callScheduler
     * @return int
     */
    public function handle()
    {
        //php artisan schedule:work
        //it will return 3 , sunday starts with zero so we add 1 to match with database value
        $dayOFWeek = date("w") + 1;

        // $currentDate = Carbon::now()->startOfDay();
        // dd($currentDate->copy()->addDay(3));
        // it start sunday with 1
        // $data = Patient::whereRaw('DAYOFWEEK(enrollment_date) = ' . $dayOFWeek)->get();
        $data = Patient::where('biweeklycall_status', '=', false)->get();
        // dd($data);
        //  dd($data[0]['biweeklycall_status']);
        $res = [];
        foreach ($data as $key => $patient) {
            // get enrolment date of the patient to add biweekly call
            $currentDate = Carbon::create($patient['enrollment_date']);
            // fetch single patients
            $counter = 0;

            for ($i = 0; $i < 80; $i++) {
                if ($i % 2 == 0) {
                    $counter += 3;
                } else {
                    $counter += 4;
                }
                Biweeklycall::create(
                    [
                        'staff_id' => $patient['staff_id'],
                        'study_id' => $patient['study_id'],
                        'patient_id' => $patient['id'],
                        'call_date' => $currentDate->copy()->addDay($counter)
                    ]
                );
            }

            Patient::where('id', $patient['id'])->update(['biweeklycall_status' => true]);
        }

        Log::info("Data updated successfully");
        return Command::SUCCESS;
    }
}
