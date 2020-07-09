<!-- JSONとAjaxを用いた練習 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Json Ajax practice</title>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

</head>
<body>
  <div>
    <input type="button" value="読込" id="load">
    <table id="listbox">
      <tr>
        <th>name</th>
        <th>価格</th>
        <th>注文数</th>
      </tr>
    </table>
    <!-- <div id="listbox"></div> -->
  </div>
  <script>
    $(function() {
    // Jqueryを使用して，クリックボタンが押されたら処理を行います
    $('#load').on('click', function(){
      console.log('hello');
      // webAPIで生成したJsonデータを取得して処理します
      $.ajax({
        url:"", //ここにデータを作るファイルのurl
        type:"GET",
        dataType: 'json'
        })
        .done(function(data) {
          console.log(data);
              // for(var i in data){
              // var tr = $("<tr>");
              //   console.log(data[i].item);
              //   console.log(data[i].price);
              //   console.log(data[i].orders);
              //           // 行にオブジェクトを生成します
              // var td_item = $('<td>').text(data[i].item);
              // tr.append(td_item);
              // var td_price = $('<td>').text(data[i].price);
              // tr.append(td_price);
              // var td_orders = $('<td>').text(data[i].orders);
              // tr.append(td_orders);
              // // 行のオブジェクトをテーブルに追加します
              // $('#listbox').append(tr);
              // }
        // 読み込みボタンを非表示化します
        $('#load').hide();
        })
        .fail(function(j,t,e){
          console.log('ダメでした');
          console.log(e);
        });
    });
    });
  </script>
</body>
</html>