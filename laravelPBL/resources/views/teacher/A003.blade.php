<!DOCTYPE html>
<html>
    <head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="./css/teacher.css">
    </head>
    <body>

      <header>
        <div class="cp_navi">
          <ul>
              <li><a id="csv" herf='CSV'>CSV出力</a></li>
            
            <li><a id="approval">承認</a></li>
            <li><a href="A003">トップに戻る</a></li>

          </ul>
          </div>

          <div id="search">
          <form action="A003" method="POST">@csrf
            <input type="checkbox" name="check1">名前<input type="text" style="width:110px;" name="name_search">
            <input type="checkbox" name='check2'>参加者NO<input type="text" style="width:50px;" name="no_search">
            <input type="checkbox" name='check3'>参加日<input type="date" style="width:125px;" name="data_search_1">~<input type="date" style="width:125px;" name="data_search_2">
            <input type="checkbox" name='check4'>参加学科<select name="class_search"><option></option><option>医療福祉学科</option><option>診療情報管理士学科</option><option>ホテル・ブライダル学科</option><option>経営アシスト学科</option><option>公務員学科</option>
            <option>公務員速修学科</option><option>保育学科</option><option>情報スペシャリスト学科</option><option>情報システム学科</option><option>ゲームクリエイター学科</option><option>ゲームプログラマー学科</option>
            <option>データマーケター学科</option><option>CGデザイン学科</option><option>ネット・動画クリエイター学科</option></select>
            <input type="checkbox" name='check5'>参加回数<select name="count_search"><option></option><option>1回</option><option>2回</option><option>3回</option><option>3回以上</option></select><br>
            <input type="checkbox" name='check6'>入試対象年度<select name="tg_search"><option>{{$year[0]}}年</option><option>{{$year[1]}}年</option></select>
            <input type="checkbox" name='check7'>高校<input type="text" name="sc_search">
            <button style="margin-left:980px" type='submit' name='search'>検索</button>
          </form>
          </div>
          <div class='remove'><div class='add_button'><button id='all'>全て選択</button></div><div class='add_button'><button id="finish">終了</button></div></div>
      </header>
        <table border="1" id="participant_table">
            <tr class="th">
            <th class='remove'>承認</th>
              <th>参加日</th>
              <th>参加者NO</th>
              <th>氏名</th>
              <th>学校名</th>
              <th>学年</th>
              <th>入試対象年度</th>
              <th>参加回数</th>
              <th>参加学科</th>
              <th>コース</th>
              <th>合否</th>
              <th>詳細</th>
            </tr>
            <?php $var = 1; ?>
            @foreach ($items as $item)
           <tr class="td">
           <?php $c=count($items); ?>
             <form action="A003/add" method="POST">@csrf<td class='remove'><input type='checkbox' class='approval_check' value="{{$item->EntrantNo}}" name="{{$var}}"></td>        
             @if($var===1)<div class='remove'><button type='submit' class="add_button" value='{{$c}}' name='approval'>承認</button></div>@endif
            </form>
               <td>{{$item->Entrant}}</td>
               <td>{{$item->EntrantNo}}</td>
               <td>{{$item->Name}}</td>
               <td>{{$item->School}}</td>
               <td>{{$item->Scyear}}</td>
               <td>{{$item->TargetAge}}</td>
               <td>{{$item->Count}}</td>
               <td>{{$item->Entry}}</td>
               <td>{{$item->Course}}</td>
               <td><form action="A003" method="POST">@csrf<button type='submit' value='{{$item->EntrantNo}}' name='registration'>登録</button></form></td>
               <td><form action="A003" method="POST">@csrf<button type='submit' value='{{$item->EntrantNo}}' name='details'>詳細</button></form></td>
           </tr>
           <?php $var++;?>
           @endforeach

          </table>

          
          <script src="../resources/js/teacher.js" ></script>

    </body>
</html>