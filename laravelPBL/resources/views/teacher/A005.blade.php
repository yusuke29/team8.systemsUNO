<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="./css/teacher.css">
    </head>
    <body>
        <h1>詳細情報</h1>
        <div id="left_table">
            <div id="details_table">
                <table border="1" id="details">
               
                    <tr><th>氏名</th><td>{{$items[0]->Name}}</td></tr>
                    <tr><th>参加日</th><td>{{$items[0]->Entrant}}</td></tr>
                    <tr><th>参加者NO</th><td>{{$items[0]->EntrantNo}}</td></tr>
                    <tr><th>年齢</th><td>{{$items[0]->Age}}</td></tr>
                    <tr><th>生年月日</th><td>{{$items[0]->Bdate}}</td></tr>
                    <tr><th>学校</th><td>{{$items[0]->School}}</td></tr>
                    <tr><th>学年</th><td>{{$items[0]->Scyear}}</td></tr>
                    <tr><th>参加学科</th><td>{{$items[0]->Entry}}</td></tr>
                    <tr><th>参加回数</th><td>{{$items[0]->Entrant}}</td></tr>
                    <tr><th>コース</th><td>{{$items[0]->Course}}</td></tr>
                    <tr><th>入試対象年度</th><td>{{$items[0]->TargetAge}}</td></tr>
                    <tr><th>合否点数</th><td>{{$items[0]->ItemSub}}</td></tr>
                    
                </table>
            </div>
            <form action="A005" method="POST">@csrf
                <div id="right_memo">
                    <p>メモ</p>
                    <textarea name="memo">{{$memo[0]->memo}}</textarea>
                </div>
        </div>
        <div class="bottom_button"><button type='submit' value='{{$items[0]->EntrantNo}}' name='A005'　class="button_1">閉じる</button></div></form>
    </body>
</html>