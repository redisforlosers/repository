<?php

namespace App\Jobs;

use App\Mail\IncidentUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUpdatedIncidentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $incident;
    protected $user;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($incident, $user)
    {
        $this->incident = $incident;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // email a notification to the staff member specified in the controller
        \Mail::to($this->user->email)->send(new IncidentUpdated($this->incident));
    }
}
