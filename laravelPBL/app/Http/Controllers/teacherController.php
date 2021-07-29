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
                else{
                    $data_set[$count]=$data_search_1;
                    $num_s[$count]=2;
                    $count++;
                }
                
            }
            if(Request::get('check4')){
                $class_search=Request::get('class_search');
                $data_set[$count]=$class_search;
                $num_s[$count]=3;
                $count++;
            }
            if(Request::get('check5')){
                $en_search=Request::get('count_search');
                $data_set[$count]=$en_search;
                $num_s[$count]=4;
                $count++;
            }
            if(Request::get('check6')){
                $tg_search=Request::get('tg_search');
                $data_set[$count]=$tg_search;
                $num_s[$count]=5;
                $count++;
            }
            if(Request::get('check7')){
                $sc_search=Request::get('sc_search');
                $data_set[$count]=$sc_search;
                $num_s[$count]=6;
                $count++;
            }
            if($count>0){
                $items=$this->set_s($data_set,$count,$num_s);
            }
            else{
                $items = DB::select('select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo');
            }
            
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
        $entry_sum=[];
        $sum=0;
        $index=0;
        $index_2=0;
        $entry_count=$this->set_count();      
        for($i=0;$i<13;$i++){
            $entry_sum[$index_2]=0;
            for($j=0;$j<3;$j++){
                $entry_sum[$index_2]+=$entry_count[$index];
                $sum+=$entry_count[$index];
                $index++;
            }
            $index_2++;
        }
        $index=0;
        for($i=0;$i<3;$i++){
            $entry_sum[$index_2]=0;
            if($i===1){
                $index=1;
            }
            else if($i===2){
                $index=2;
            }
            for($j=0;$j<13;$j++){
                $entry_sum[$index_2]+=$entry_count[$index];
                $index+=3;
            }
            $index_2++;
        }
        $entry_sum[$index_2]=$sum;

        return view('teacher.A004',['count'=>$entry_count],['sum'=>$entry_sum]);
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

$param=[];
        for($i=0;$i<$n;$i++){
            switch($num_search[$i]){
                case 0:$param=$param+array('name'=>$ar[$i]);if($i!=0){$item=$item." OR p.Name=:name";}else{$item=$item." AND (p.Name=:name";}break;
                case 1:$param =$param+array('number'=>$ar[$i]);if($i!=0){$item=$item." OR p.EntrantNo=:number";}else{$item=$item." AND (p.EntrantNo=:number";}break;
                case 2:$param =$param+array('date1'=>$ar[$i]);$i++;$param =$param+array('date2'=>$ar[$i]);if(($i-1)!=0){$item=$item." OR i.Entrant BETWEEN :date1 AND :date2";}else{$item=$item." AND ((i.Entrant BETWEEN :date1 AND :date2)";}break;
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
    public function set_count(){
        $entry_count=[];
        $index_count=0;
        $text="";
        $today = date("Y-m-d");
        $scyear=["高校１年生","高校２年生","高校３年生","既卒"];
        $item='select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.Entry=:class AND p.Scyear=';
        $param=[];
        $class=["情報スペシャリスト学科","情報システム学科","データマーケター学科","ネット・動画クリエイター学科","CGデザイン学科","ゲームクリエイター学科","ゲームプログラマー学科","経営アシスト学科","医療福祉事務学科","公務員学科","ホテル・ブライダル学科","診療情報管理士学科","保育学科"];
        for($i=0;$i<13;$i++){
            $param=$param+array('class'=>$class[$i]);
            for($j=0;$j<3;$j++){
                $param=[];
                $t="scyear_".$j;
                $param=$param+array($t=>$scyear[$j]);
                $param=$param+array('class'=>$class[$i]);
                $param=$param+array('today'=>$today);
                $item='select i.Entrant,p.EntrantNo,p.Name,p.School,p.Scyear,i.TargetAge,i.Count,i.Entry,i.Course from participant p,participantinfo i where p.EntrantNo=i.EntrantNo AND (i.Entry=:class AND i.Entrant=:today AND (p.Scyear=:';
                if($j>=2){
                    $t_2="scyear_".($j+1);
                    $param=$param+array($t_2=>$scyear[$j+1]);
                    $text="scyear_".$j." OR p.Scyear=:scyear_".($j+1)."))";                    
                }
                else{
                    $text="scyear_".$j."))"; 
                }

                $item=$item.$text;
                $items=DB::select($item,$param);
                $entry_count[$index_count]=count($items);
                $index_count++;
            }
        }
        return $entry_count;
    }
}



