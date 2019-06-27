<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;

    protected $textArray;

    protected $subject;

    protected $emailFrom;
    protected $app_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $textArray, $subject)
    {
        $this->email = $email;
        $this->textArray = $textArray;
        $this->subject = $subject;
        $this->emailFrom = env("MAIL_USERNAME");
        $this->app_name = env("APP_NAME");

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(['html' => 'email_template'], $this->textArray, function($message){
            $message->from($this->emailFrom, $this->app_name);
            $message->to($this->email);
            $message->subject($this->subject);
        });
    }
}
