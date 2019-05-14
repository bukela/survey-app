<?php

namespace App\Console\Commands;

use App\Mail\NotifyDoctor;
use App\Notification;
use App\Patient;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swapp:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users to do second survey';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notifications = Notification::whereDate('send_at', '=', (new Carbon())->format('Y-m-d'))
            ->where('sent', false)
            ->get();

        if ($notifications) {
            foreach ($notifications as $notification) {
                $doctor = User::find($notification->doctor_id);
                $patient = Patient::find($notification->patient_id);

                try {
                    Mail::to($doctor->email)->send(new NotifyDoctor($doctor, $patient));

                    $notification->sent = true;
                    $notification->save();

                    Log::info('Notification for second survey sent to: ' . $doctor->email);
                } catch (ConnectException $e) {
                    Log::error('Notification for second survey NOT sent to: ' . $doctor->email);
                }
            }
        }
    }
}
