<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Log;

class teacherController extends Controller{

    public function A001(){
        return view('teacher.A001');
    }
    public function A002(){
        return view('teacher.A002');
    }
    public function A003(){
        $year[0]=date('Y', strtotime('+1 year'));
        $year[1]=date('Y', strtotime('+2 year'));
        $items = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo');

        return view('teacher.A003',['items'=>$items],['year'=>$year]);
    }
    public function A003_post(Request $request){
        $data_set=[];
        $count=0;
        $num_s=[];

        if(Request::get('details')){
            $E_No=Request::get('details');
            $items=DB::select('select p.Name,i.Entrant,p.EntrantNo,p.Age,p.Bdate,p.School,p.Scyear,i.Entry,p.Entrant,i.Course,i.TargetAge,pa.ItemSub,pa.approval from participant p,participantinfo i,passfail pa where p.EntrantNo=i.EntrantNo AND pa.EntrantNo=i.EntrantNo AND pa.EntrantNo=p.EntrantNo AND p.EntrantNo=:E_No',array('E_No' => $E_No));
           $memo_text=DB::select('select memo from participantinfo where EntrantNo=:E_No',array('E_No' => $E_No));
           return view('teacher.A005',['items'=>$items],['memo'=>$memo_text]);
        }
        else if(Request::get('registration')){
            $E_No=Request::get('registration');
            $pass_memo=DB::select('select FailureMemo from passfail where EntrantNo=:E_No',array('E_No' => $E_No));

            $items=DB::select('select EntrantNo,Item1,Item2,Item3,Item4,Item5,ItemSub from passfail where EntrantNo=:E_No',array('E_No' => $E_No));
            return view('teacher.A006',['items'=>$items],['pass'=>$pass_memo]);
        }  
        else{
            if(Request::get('check1')){
                $name_search=Request::get('name_search');
                $data_set[$count]=$name_search;
                $num_s[$count]=0;
                $count++;
            }
            if(Request::get('check2')){
                $no_search=Request::get('no_search');
                $data_set[$count]=$no_search;
                $num_s[$count]=1;
                $count++;
            }
            if(Request::get('check3')){
                $data_search_1=Request::get('data_search_1');
                $data_search_2=Request::get('data_search_2');
                $data_set[$count]=$data_search_1;
                $num_s[$count]=2;
                $count++;
                if($data_search_2!=""){
                    $data_set[$count]=$data_search_2;
                    $num_s[$count]=3;
                    $count++;
                }
                
                
            }
            if(Request::get('check4')){
                $class_search=Request::get('class_search');
                $data_set[$count]=$class_search;
                $num_s[$count]=4;
                $count++;
            }
            if(Request::get('check5')){
                $en_search=Request::get('count_search');
                $data_set[$count]=$en_search;
                $num_s[$count]=5;
                $count++;
            }
            if(Request::get('check6')){
                $tg_search=Request::get('tg_search');
                $data_set[$count]=$tg_search;
                $num_s[$count]=6;
                $count++;
            }
            if(Request::get('check7')){
                $sc_search=Request::get('sc_search');
                $data_set[$count]=$sc_search;
                $num_s[$count]=7;
                $count++;
            }
            $items=$this->set_s($data_set,$count,$num_s);
            
            $year[0]=date('Y', strtotime('+1 year'));
            $year[1]=date('Y', strtotime('+2 year'));
           //$items = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo');
            return view('teacher.A003',['items'=>$items],['year'=>$year]);
        }
        
        
    
       
    }
    public function A003_add_post(){
        $co=Request::get('approval');
        for($i=1;$i<$co;$i++){
            $param=[
                'id'=>Request::get($i)
            ];
            DB::update('update passfail set approval="1" where EntrantNo = :id',$param);
        }
        return redirect('/A003');
    }
    public function A004(){
        return view('teacher.A004');
    }
    public function A005(){
        return view('teacher.A005');
    }
    public function A005_post(){
        $param =[
            'id'=>Request::get('A005'),
            'memo'=>Request::get('memo')];
        DB::update('update participantinfo set Memo =:memo where EntrantNo = :id',$param);


        $year[0]=date('Y', strtotime('+1 year'));
        $year[1]=date('Y', strtotime('+2 year'));
        $items = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo');

        return view('teacher.A003',['items'=>$items],['year'=>$year]);
    }

    public function A006(){
        return view('teacher.A006');
    }
    public function A006_post(){
        $sum=(int)Request::get('q1')+(int)Request::get('q2')+(int)Request::get('q3')+(int)Request::get('q4')+(int)Request::get('q5');
        $param =[
            'id'=>Request::get('A006'),
            'pass'=>Request::get('Pass'),
            'item1'=>Request::get('q1'),
            'item2'=>Request::get('q2'),
            'item3'=>Request::get('q3'),
            'item4'=>Request::get('q4'),
        'item5'=>Request::get('q5'),
    'itemsub'=>$sum ];
      
        DB::update('update passfail set FailureMemo =:pass,Item1=:item1,Item2=:item2,Item3=:item3,Item4=:item4,Item5=:item5,ItemSub=:itemsub where EntrantNo = :id',$param);

        $year[0]=date('Y', strtotime('+1 year'));
        $year[1]=date('Y', strtotime('+2 year'));
        $items = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo');

        return view('teacher.A003',['items'=>$items],['year'=>$year]);
    }

    public function set_s($ar,$n,$num_search){
        $item='select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo';
        /*switch($n){
            case 1:
                switch($num_search[0]){
                    case 0:$param =['name'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (p.Name=:name',$param);break;
                    case 1:$param =['number'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (p.EntrantNo=:number',$param);break;
                    case 2:$param =['date_1'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.Entrant=:date_1',$param);break;
                    case 4:$param =['class'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.Entry=:class',$param);break;
                    case 5:$param =['count'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.Count=:count',$param);break;
                    case 6:$param =['tg'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.TargetAge=:tg',$param);break;
                    case 7:$param =['sc'=>$ar[0]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (p.School=:sc',$param);break;
                } 
                break;
            case 2:
                for($i=0;$i<$n;$i++){
                    switch($num_search[$i]){
                        case 0:$param =['name'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND p.Name=:name',$param);break;
                        case 1:$param =['number'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND p.EntrantNo=:number',$param);break;
                        case 2:$param =['date_1'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND i.Entrant=:date_1',$param);break;
                        case 4:$param =['class'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND i.Entry=:class',$param);break;
                        case 5:$param =['count'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND i.Count=:count',$param);break;
                        case 6:$param =['tg'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND i.TargetAge=:tg',$param);break;
                        case 7:$param =['sc'=>$ar[$i]];$item = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND p.School=:sc',$param);break;
                    } 
                }
                break;
        }*/
$param=[];
        for($i=0;$i<$n;$i++){
            switch($num_search[$i]){
                case 0:$param=$param+array('name'=>$ar[$i]);if($i!=0){$item=$item." OR p.Name=:name";}else{$item=$item." AND (p.Name=:name";}break;
                case 1:$param =$param+array('number'=>$ar[$i]);if($i!=0){$item=$item." OR p.EntrantNo=:number";}else{$item=$item." AND (p.EntrantNo=:number";}break;
                case 2:$param[$i] ="'date_1'=>"+$ar[$i];break;
                case 4:$param =$param+array('class'=>$ar[$i]);if($i!=0){$item=$item." OR i.Entry=:class";}else{$item=$item." AND (i.Entry=:class";}break;
                case 5:$param =$param+array('count'=>$ar[$i]);if($i!=0){$item=$item." OR i.Count=:count";}else{$item=$item." AND (i.Count=:count";}break;
                case 6:$param =$param+array('tg'=>$ar[$i]);if($i!=0){$item=$item." OR i.TargetAge=:tg";}else{$item=$item." AND (i.TargetAge=:tg";}break;
                case 7:$param =$param+array('sc'=>$ar[$i]);if($i!=0){$item=$item." OR p.School=:sc";}else{$item=$item." AND (p.School=:sc";}break;
            } 
        }
        $item=$item.")";
        $item = DB::select($item,$param);
        return $item;
    }
}

