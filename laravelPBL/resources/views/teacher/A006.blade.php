<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="./css/teacher.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>合否登録</h1>
        <form action="A006" method="POST">@csrf
        <div id="left_table">
        <div id="left">
        <p>項目１<br>
        @if($items[0]->Item1)
            @switch($items[0]->Item1)
                @case(2)
                <input type="radio" name="q1" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q1" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q1" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q1" value="2" class="input_r" checked="checked"> <lavel class="form_r">2</lavel class="form_r">
                @break
                @case(4)
                <input type="radio" name="q1" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q1" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q1" value="4" class="input_r" checked="checked"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q1" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(6)
                <input type="radio" name="q1" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q1" value="6" class="input_r" checked="checked"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q1" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q1" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(8)
                <input type="radio" name="q1" value="8" class="input_r" checked="checked"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q1" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q1" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q1" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
            @endswitch
                
                
            </p>
            <p>項目２<br>
            @switch($items[0]->Item2)
                @case(2)
                <input type="radio" name="q2" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q2" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q2" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q2" value="2" class="input_r" checked="checked"> <lavel class="form_r">2</lavel class="form_r">
                @break
                @case(4)
                <input type="radio" name="q2" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q2" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q2" value="4" class="input_r" checked="checked"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q2" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(6)
                <input type="radio" name="q2" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q2" value="6" class="input_r" checked="checked"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q2" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q2" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(8)
                <input type="radio" name="q2" value="8" class="input_r" checked="checked"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q2" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q2" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q2" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
            @endswitch
            </p>
            <p>項目３<br>
            @switch($items[0]->Item3)
                @case(2)
                <input type="radio" name="q3" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q3" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q3" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q3" value="2" class="input_r" checked="checked"> <lavel class="form_r">2</lavel class="form_r">
                @break
                @case(4)
                <input type="radio" name="q3" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q3" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q3" value="4" class="input_r" checked="checked"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q3" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(6)
                <input type="radio" name="q3" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q3" value="6" class="input_r" checked="checked"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q3" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q3" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(8)
                <input type="radio" name="q3" value="8" class="input_r" checked="checked"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q3" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q3" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q3" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
            @endswitch
            </p>
            <p>項目４<br>
            @switch($items[0]->Item4)
                @case(2)
                <input type="radio" name="q4" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q4" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q4" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q4" value="2" class="input_r" checked="checked"> <lavel class="form_r">2</lavel class="form_r">
                @break
                @case(4)
                <input type="radio" name="q4" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q4" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q4" value="4" class="input_r" checked="checked"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q4" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(6)
                <input type="radio" name="q4" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q4" value="6" class="input_r" checked="checked"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q4" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q4" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(8)
                <input type="radio" name="q4" value="8" class="input_r" checked="checked"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q4" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q4" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q4" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
            @endswitch
            </p>
            <p>項目５<br>
            @switch($items[0]->Item5)
                @case(2)
                <input type="radio" name="q5" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q5" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q5" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q5" value="2" class="input_r" checked="checked"> <lavel class="form_r">2</lavel class="form_r">
                @break
                @case(4)
                <input type="radio" name="q5" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q5" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q5" value="4" class="input_r" checked="checked"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q5" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(6)
                <input type="radio" name="q5" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q5" value="6" class="input_r" checked="checked"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q5" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q5" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                    @break
                @case(8)
                <input type="radio" name="q5" value="8" class="input_r" checked="checked"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q5" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q5" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q5" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
            @endswitch
        @else
                <input type="radio" name="q1" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q1" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q1" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q1" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                <p>項目２<br>
                <input type="radio" name="q2" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q2" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q2" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q2" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                <p>項目３<br>
                <input type="radio" name="q3" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q3" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q3" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q3" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                <p>項目４<br>
                <input type="radio" name="q4" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q4" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q4" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q4" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
                <p>項目５<br>
                <input type="radio" name="q5" value="8" class="input_r"> <lavel class="form_r">8</lavel class="form_r">
                <input type="radio" name="q5" value="6" class="input_r"> <lavel class="form_r">6</lavel class="form_r">
                <input type="radio" name="q5" value="4" class="input_r"> <lavel class="form_r">4</lavel class="form_r">
                <input type="radio" name="q5" value="2" class="input_r"> <lavel class="form_r">2</lavel class="form_r">
        @endif
        </p>
        <p id="sum" name="sum_pass">合計：{{$items[0]->ItemSub}}</p>
        </div>
        
        <div id="right">
            <p>不合格理由</p>
            <textarea name="Pass">{{$pass[0]->FailureMemo}}</textarea>
        </div>
        </div>
        <div class="bottom_button"><button type='submit' value='{{$items[0]->EntrantNo}}' name='A006'　class="button_1">登録</button></div></form>
        <script>
            $(".button_1").click(function(){
                alert("a");
            });
        </script>
        <script src="../resources/js/teacher.js" ></script>
    </body>
</html>