<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ ('css/participant.css') }}">
        <title>A013</title>
    </head>
    <header class="header">
        <p>岡山情報ビジネス学院<br>オープンキャンパス参加者情報確認画面</p>
    </header>
    <body>
        <p><span id="messe">受付で担当の方と確認してください！</span></p>
        <form action="A013_1" method="post">
        @csrf
            <p><strong>1.参加者名</strong><br>
                <input type="text" class="text" name="Name" value="{{$Name}}"></p>

            <p><strong>2.参加学科</strong><br>
                <input type="text" class="text" name="Entry" value="{{$Entry}}"></p>

            <p><strong>3.参加コース</strong><br>
                <input type="text" class="text" name="Course" value="{{$Course}}"></p>

            <p><strong>4.学校情報</strong><br>
                <input type="text" class="text" name="School" value="{{$School}}"><br></p>
                <p><input type="text" class="text" name="Department" value="{{$Department}}"><br></p>
                <p><input type="text" class="text" name="Scyear" value="{{$Scyear}}"></p>

            <p><strong>5.お住まいの地域</strong><br>
            @if($area != '')
                <input type="text" class="text" name="area" value="{{$area}}"></p>
            @endif
            @if($area2 != '')
                <input type="text" class="text" name="area2" value="{{$area2}}"></p>
            @endif
            @if($area3 != '')
                <p><input type="text" class="text" name="area3" value="{{$area3}}"></p>
            @endif

            
            <!--交通費支給対象の場合-->
            <div　id="target">
                <p><span style="background-color: #e4e004;">
                <font color="blue">交通費支給対象地域です。<br>案内をして下さい。&emsp;&emsp;&emsp;</font>
                </span></p>
            </div>
            <input type="button" onclick="history.back()" id="miss" value="訂正する">
            <input type="submit" id="last_confirm" value="確定">
        </form>
    </body>
</html>