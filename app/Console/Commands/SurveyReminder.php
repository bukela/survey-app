<?php

namespace App\Console\Commands;

use App\Reminder;
use App\Role;
use App\User;
use App\SurveyDoctorPatient;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SurveyReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swapp:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder for survey three';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $role    = Role::select('id')->where('code', 'doctor')->first();
        $doctors = User::where('role_id', $role->id)->get();

        foreach ($doctors as $doctor) {
            if (Reminder::where('doctor_id', $doctor->id)->exists()) {
                continue;
            }

            $surveysDone = SurveyDoctorPatient::select('id')->where('doctor_id', $doctor->id)->count();

            if ($surveysDone >= 20) {
                $this->sendMessage($doctor);
            }
        }
    }

    private function sendMessage($doctor)
    {
        $url = route('doctor.survey.create.final', ['doctor' => $doctor]);

        try {
            Mail::to($doctor->email)
                ->send(new \App\Mail\SurveyReminder($doctor, $url));

            Log::info('Notification for last survey sent to: ' . $doctor->email);

            $reminded = new Reminder();
            $reminded->doctor_id = $doctor->id;
            $reminded->save();
        } catch (ConnectException $e) {
            Log::error('Notification for last survey NOT sent to (will retry): ' . $doctor->email . ' - ' . $e->getMessage());
        }
    }
}
