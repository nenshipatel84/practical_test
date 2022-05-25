<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventDetails;
use App\Models\EventOccurences;
use App\Console\Commands\Log;

class generateEventOccurences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Event Occurences';

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
        $date = date("Y-m-d");
        $event_data =  EventOccurences::leftjoin("events","events.id","=","event_occurences.event_id")->leftjoin("event_details","event_details.id","=","event_occurences.event_details_id")->select("event_occurences.*","event_details.week_days","events.start_date","events.end_date","events.id as event_id","event_details.id as event_details_id","event_details.qty","event_details.months")->where('events.end_date',">=",date("Y-m-d"))->where("events.is_delete",0)->get();

        foreach($event_data as $details){
            //Day
            if($details->frequency == 1){
                EventOccurences::create([
                    'event_id' => $details->event_id,
                    'event_details_id' => $details->event_details_id
                ]);
            }
            // Week
            if($details->frequency == 2){
                $current_data = EventOccurences::where("event_details_id",$details->event_details_id)->first();

                $week_date = date("Y-m-d",strtotime($current_data->created_at));
                $add_week = date("Y-m-d",strtotime("+7 day",$week_date));
                if(strtotime($add_week) == strtotime($date))
                EventOccurences::create([
                    'event_id' => $details->event_id,
                    'event_details_id' => $details->event_details_id
                ]);
            }
            // Month
            if($details->frequency == 3){
                $current_data = EventOccurences::where("event_details_id",$details->event_details_id)->first();

                $month_date = date("Y-m-d",strtotime($current_data->created_at));
                $add_month = date("Y-m-d",strtotime("+1 Month",$month_date));
                if(strtotime($add_month) == strtotime($date))
                EventOccurences::create([
                    'event_id' => $details->event_id,
                    'event_details_id' => $details->event_details_id
                ]);
            }
            // Year
            if($details->frequency == 4){
                $current_data = EventOccurences::where("event_details_id",$details->event_details_id)->first();

                $year_date = date("Y-m-d",strtotime($current_data->created_at));
                $add_year = date("Y-m-d",strtotime("+1 year",$year_date));
                if(strtotime($add_year) == strtotime($date))
                EventOccurences::create([
                    'event_id' => $details->event_id,
                    'event_details_id' => $details->event_details_id
                ]);
            }

            // week days (sunday)
            if($details->week_days == 1){
                $current_data = EventOccurences::where("event_details_id",$details->event_details_id)->first();

                $added_date = date("Y-m-d",strtotime($current_data->created_at));
                $month = $current_data->months;
               
                $qty = $current_data->qty;

                $add_months = date("Y-m-d",strtotime("+".$month." Month",$added_date));
                if(strtotime($add_months) == strtotime($date)){
                    EventOccurences::create([
                        'event_id' => $details->event_id,
                        'event_details_id' => $details->event_details_id
                    ]);
                }
            }

            //stop occurrences
            if($details->end_date == $date){
                EventOccurences::where("event_id",$details->event_id)->delete();
            }
        }
       
        // return 0;
    }
}
