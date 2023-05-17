<?php

namespace App\Console\Commands;

use App\Mail\EventReminder;
use App\Models\Scheduler;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;




class SendEventReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:event-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email reminder to the user 5 minutes before the event';

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
     * @return int
     */
    public function handle()
    {
        $schedulers = Scheduler::all();

        foreach ($schedulers as $key => $value) {
            $user = User::find($value->student_id);

            $eventDate = Carbon::parse($value->start_datetime);
            $reminderTime = $eventDate->subMinutes(5);
            $timeNow = Carbon::now()->setSeconds(0);

            if((string)$timeNow == (string)$reminderTime){
                
                $data = [
                    'subject' => 'Event Reminder',
                    'priority' => $value->priority,
                    'msg' => 'Please be reminded that your '.$value->event_name.' event will be started in 5 minutes time.',
                    'thankyou' => 'Thank You',
                ];
                try{
                Mail::to($user->email)->send(new EventReminder($data)); 
                }catch(Exception $e){
                    echo $e->getMessage();
                }
              
            }
           
        }
    }
}
