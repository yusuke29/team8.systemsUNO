var control_flag=true;
var num_count1=0;
var num_count2=0;
var num_count3=0;
var num_count4=0;
var num_count5=0;
var sum=0;


function downloadCSV(name) {
    //ダウンロードするCSVファイル名を指定する
    const filename = name+'.csv';
    //CSVデータ
    const data = getData();
    //BOMを付与する（Excelでの文字化け対策）
    const bom = new Uint8Array([0xef, 0xbb, 0xbf]);
    //Blobでデータを作成する
    const blob = new Blob([bom, data], { type: "text/csv" });

        //BlobからオブジェクトURLを作成する
        const url = (window.URL || window.webkitURL).createObjectURL(blob);
        //ダウンロード用にリンクを作成する
        const download = document.createElement("a");
        //リンク先に上記で生成したURLを指定する
        download.href = url;
        //download属性にファイル名を指定する
        download.download = filename;
        //作成したリンクをクリックしてダウンロードを実行する
        download.click();
        //createObjectURLで作成したオブジェクトURLを開放する
        (window.URL || window.webkitURL).revokeObjectURL(url);
}

$('#csv').click(function(){
    var file_name=prompt("保存するファイルの名前");
    if(file_name!=null){
    downloadCSV(file_name);
    
    }
})

$('body').on('click', '#finish', function() {
    var td = $('.remove');
    var state = td.css('display');
    td.css('display', 'none');
  });

  $('body').on('click', '#all', function() {
    $('.approval_check').prop('checked', true);
  });


$('#approval').click(function(){

    var td = $('.remove');
    var state = td.css('display');
    if(state === 'block') {
        td.css('display', 'none');
    }
    else {
        td.css('display', 'block');
    }


});


$('input:radio[name="q1"]').change(function() {
    sum_a();
});
$('input:radio[name="q2"]').change(function() {
    sum_a();
});
$('input:radio[name="q3"]').change(function() {
    sum_a();
});
$('input:radio[name="q4"]').change(function() {
    sum_a();
});
$('input:radio[name="q5"]').change(function() {
    sum_a();
});

function sum_a(){
    num_count1=parseInt($('input:radio[name="q1"]:checked').val());
    num_count2=parseInt($('input:radio[name="q2"]:checked').val());
    num_count3=parseInt($('input:radio[name="q3"]:checked').val());
    num_count4=parseInt($('input:radio[name="q4"]:checked').val());
    num_count5=parseInt($('input:radio[name="q5"]:checked').val());
    sum=num_count1+num_count2+num_count3+num_count4+num_count5;
    $('#sum').text("合計："+sum);
}


function getData(){
    var dd="";
    $('table tr').each(function(i, e){
      
     if (i===0){ $(this).find('th').each(function(j, el){
                if(j<=8){
                   
                    dd+=$(this).text()+",";
                    
                }
        });
                  dd+='\n';
               } 
    else{ $(this).find('td').each(function(j, el){
        if(j<=8){
        dd+=$(this).text()+",";
    }});
                  dd+='\n';
    }
    });
return dd;
}

