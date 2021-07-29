<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>集計表</title>
    <link rel="stylesheet" type="text/css" href="css/totalization table.css" media="all" />
<body>
    <h2>説明会参加者・参加学科集計表</h2>
    <div class="flex">
        <div class="container-1">
        <a href="A002" class="btn-border">戻る</a>
    </div>
    <table border="3" width="70%" height="90%">
        <tr align="center" valign="">
          <th>イベントコード</th>
          <th bgcolor="a9a9a9"><select name="イベントコード" size="1">
            <option value=""></option>
            <option value="選択肢1">1</option>
            <option value="選択肢2">2</option>
            <option value="選択肢3">3</option>
            <option value="選択肢4">4</option>
            <option value="選択肢5">5</option>
            </select>
        </th>
            
            </th>
        </tr>
        <tr align="center" valign="">
          <td>学科</td>
          <td bgcolor="a9a9a9" width="25%">合計</td>
          <td bgcolor="a9a9a9">3年以上</td>
          <td bgcolor="a9a9a9" width="15%">2年</td>
          <td bgcolor="a9a9a9" width="15%">1年</td>
        </tr>
        <tr align="center" valign="">
          <td>情報スペシャリスト学科</td>
          <td bgcolor="a9a9a9">{{$sum[0]}}</td>
          <td>{{$count[2]}}</td>
          <td>{{$count[1]}}</td>
          <td>{{$count[0]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>情報システム学科</td>
            <td bgcolor="a9a9a9">{{$sum[1]}}</td>
            <td>{{$count[5]}}</td>
          <td>{{$count[4]}}</td>
          <td>{{$count[3]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>データマーケター学科</td>
            <td bgcolor="a9a9a9">{{$sum[2]}}</td>
            <td>{{$count[8]}}</td>
          <td>{{$count[7]}}</td>
          <td>{{$count[6]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>ネット・動画クリエイター学科</td>
            <td bgcolor="a9a9a9">{{$sum[3]}}</td>
            <td>{{$count[11]}}</td>
          <td>{{$count[10]}}</td>
          <td>{{$count[9]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>CGデザイン学科</td>
            <td bgcolor="a9a9a9">{{$sum[4]}}</td>
            <td>{{$count[14]}}</td>
          <td>{{$count[13]}}</td>
          <td>{{$count[12]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>ゲームクリエイター学科</td>
            <td bgcolor="a9a9a9">{{$sum[5]}}</td>
            <td>{{$count[17]}}</td>
          <td>{{$count[16]}}</td>
          <td>{{$count[15]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>ゲームプログラマー学科</td>
            <td bgcolor="a9a9a9">{{$sum[6]}}</td>
            <td>{{$count[20]}}</td>
          <td>{{$count[19]}}</td>
          <td>{{$count[18]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>経営アシスト学科</td>
            <td bgcolor="a9a9a9">{{$sum[7]}}</td>
            <td>{{$count[23]}}</td>
          <td>{{$count[22]}}</td>
          <td>{{$count[21]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>医療福祉事務学科</td>
            <td bgcolor="a9a9a9">{{$sum[8]}}</td>
            <td>{{$count[26]}}</td>
          <td>{{$count[25]}}</td>
          <td>{{$count[24]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>公務員学科</td>
            <td bgcolor="a9a9a9">{{$sum[9]}}</td>
            <td>{{$count[29]}}</td>
          <td>{{$count[28]}}</td>
          <td>{{$count[27]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>ホテルブライダル学科</td>
            <td bgcolor="a9a9a9">{{$sum[10]}}</td>
            <td>{{$count[32]}}</td>
          <td>{{$count[31]}}</td>
          <td>{{$count[30]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>診療情報管理士学科</td>
            <td bgcolor="a9a9a9">{{$sum[11]}}</td>
            <td>{{$count[35]}}</td>
          <td>{{$count[34]}}</td>
          <td>{{$count[33]}}</td>
        </tr>
        <tr align="center" valign="">
            <td>保育学科</td>
            <td bgcolor="a9a9a9">{{$sum[12]}}</td>
            <td>{{$count[38]}}</td>
          <td>{{$count[37]}}</td>
          <td>{{$count[36]}}</td>
        </tr>
        <tr align="center" valign="" bgcolor="a9a9a9">
            <td>合計</td>
            <td>{{$sum[16]}}</td>
            <td>{{$sum[15]}}</td>
            <td>{{$sum[14]}}</td>
            <td>{{$sum[13]}}</td>
        </tr>
      </table>

</body>
</html>