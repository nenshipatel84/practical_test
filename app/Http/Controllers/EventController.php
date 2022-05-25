<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventDetails;
use App\Models\EventOccurences;
use DB;

class EventController extends Controller
{
    //
    public function view_event(){
        $data['events'] = Event::leftjoin("event_details","event_details.id","=","events.id")
                            ->select("events.*","event_details.frequency","event_details.week_days","event_details.qty","event_details.months")
                            ->where("events.is_delete",0)
                            ->get();
        return view("events.index",$data);
    }

    public function create(){
        return view("events.add");
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required',
            'sdate' => 'required',
            'edate' => 'required',
        ]);

        $add_event = Event::create([
            'event_title' => $request->name,
            'start_date' => date("Y-m-d",strtotime($request->sdate)),
            'end_date' => date("Y-m-d",strtotime($request->edate)),
        ])->id;
            if($request->qty!=""){
                $qty = $request->qty;
            }else if($request->qty1!=""){
                $qty = $request->qty1;
            }
        if($add_event){
            $event_details = EventDetails::create([
                'event_id' => $add_event,
                'frequency' =>$request->frequency ,
                'week_days' =>$request->week_days ,
                'qty' => $qty ,
                'months' => $request->months,
            ])->id;

            $event_data = Event::where("id",$add_event)->where("is_delete",0)->first();
            // dd(date("Y-m-d"));
                
            if($event_data->start_date >= date("Y-m-d")){
                EventOccurences::create([
                    'event_id' => $add_event,
                    'event_details_id' => $event_details
                ]);
            }
            
        }
        return redirect("view_events")->with("success","Event has been created successfully");
    }

    public function edit_event(Request $request,$id){
        if($_POST){
            $request->validate([
                'name' => 'required',
                'sdate' => 'required',
                'edate' => 'required',
            ]);

            Event::where("id",$id)->update([
                'event_title' => $request->name,
                'start_date' => date("Y-m-d",strtotime($request->sdate)),
                'end_date' => date("Y-m-d",strtotime($request->edate)),
            ]);
            return redirect("view_events")->with("success","Event has been edited successfully");
        }else{
            $data['details'] = Event::where("id",$id)->where("is_delete",0)->first();
            return view("events.edit",$data);
        }
        
    }
    public function delete_event($id){
        Event::where("id",$id)->update([
            'is_delete' => 1,
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        EventDetails::where("id",$id)->delete();
        EventOccurences::where("event_id",$id)->delete();
        return redirect("view_events")->with("success","Event has been deleted successfully");
    }

    public function view_event_details($id){
        $data['event_name'] = Event::where("id",$id)->where("is_delete",0)->first();
        $data['event_details'] = EventOccurences::leftjoin("events","events.id","=","event_occurences.event_id")->leftjoin("event_details","event_details.id","=","event_occurences.event_details_id")->select("event_occurences.*","event_details.week_days","event_details.frequency")->where("event_occurences.event_id",$id)->where("events.is_delete",0)->get();

        // dd($data['event_details']);
        return view("events.view",$data);
    }
}
