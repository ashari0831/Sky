<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Models\StrangersEmail;


class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $products;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $products)
    {
        $this->emails= $emails;
        $this->products= $products;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Mail::to($this->emails)->send(new SendNewsletter($this->products));

    //   echo 'hello world';
    //         $emails = StrangersEmail::all()->first()->delete();

    //         $products = Product::where('updated_at','>=',Carbon\Carbon::now()->subDays(4)->startOfDay())->get();

    }
}
