<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class partiController extends Controller{

    public function A007(){
        return view('participant.A007');
    }

    public function A008(){
        return view('participant.A008');
    }

    public function A009(){
        return view('participant.A009');
    }

    public function A010(){
        return view('participant.A010');
    }

    public function A011(){
        return view('participant.A011');
    }

    public function A012(){
        return view('participant.A012');
    }


    public function A012_1(Request $request){

        $Name = $request -> Name;
        $Entry = $request -> Entry;
        $Course = $request -> Course;
        $Scyear = $request -> Scyear;
        $sc = $request -> sc;
        $School = $request -> School;
        $Department = $request -> Department;
        $area = $request -> area;
        $area2 = $request -> area2;
        $area3 = $request -> area3;

        $judg = 0;
        switch($area){
            case "津山町":
            case "奈義町":
            case "勝央町":
            case "新見市":
            case "真庭市":
            case "新庄村":
            case "鏡野町":
            case "西栗倉町":
                $judg = 1;
         }
        return view('participant.A013',['Name'=>$Name,
                                        'Entry'=>$Entry,
                                        'Course'=>$Course,
                                        'Scyear'=>$Scyear,
                                        'School'=>$School,
                                        'Department'=>$Department,
                                        'area'=>$area,
                                        'area2'=>$area2,
                                        'area3'=>$area3,
                                        'judg'=>$judg]);
    }
    public function A013(){
        return view('participant.A013');
    }

    public function A013_1(Request $request){
        //受付番号カウント
        if(session()->has('count')){
            $count = session('count');
        }else{
            $count = 0;
        }
        
        $date = date('md');
        $count++;
        session(['count' => "$count"]);

        $EntrantNo = "A".$date.$count; //参加者番号発行

        $Entrant = date('Ymd');

        $a = $request->Scyear;

        if($a === "高校１年生"){
            $TargetAge = date('Y', strtotime('+2 year'));
        }elseif($a === "高校２年生"){
            $TargetAge = date('Y', strtotime('+1 year'));
        }elseif($a === "高校３年生" || $a === "既卒"){
            $TargetAge = date('Y');
        }

        $parti = [
                    'Name'=>$request->Name,
                    'School'=>$request->School,
                    'Department'=>$request->Department,
                    'Scyear'=>$request->Scyear,
                    'EntrantNo' => $EntrantNo,
                    'Entrant' => $Entrant
                ];

        $parm = [
                    'EntrantNo' => $EntrantNo,
                    'Entry'=> $request->Entry,
                    'Course'=> $request->Course,
                    'Entrant' => $Entrant,
                    'TargetAge' => $TargetAge
                ];
        
        $pass = [
                    'EntrantNo' => $EntrantNo,
                    'Entrant' => $Entrant,
                ];
        DB::insert('insert into participant (Name,EntrantNo,School,Department,Scyear,Entrant) values (:Name,:EntrantNo,:School,:Department,:Scyear,:Entrant)', $parti);
        DB::insert('insert into participantinfo (EntrantNo,Entrant,Entry,Course,TargetAge) values (:EntrantNo,:Entrant,:Entry,:Course,:TargetAge)',$parm);
        DB::insert('insert into passfail (EntrantNo,Entrant) values (:EntrantNo,:Entrant)',$pass);
        return view('participant.A014',['count'=>$count]);
    }


    public function A014(){
        return view('participant.A014');
    }
}


