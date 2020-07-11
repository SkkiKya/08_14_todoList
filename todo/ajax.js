$(function() {
  // jQueryを使用して，クリックボタンが押されたら非同期処理を行います
  const getDataAll = function () {
            // APIで生成したJsonデータを取得して処理します
    $.ajax({
      url:"read.php", //ここにデータを作るファイルのurl
      type:"GET",
      dataType: 'json'
      })
      .done(function(data) {
        console.log(data);
            for(var i in data){
            var tr = $("<tr>");
            //   console.log(data[i].id);
            //   console.log(data[i].deadline);
            //   console.log(data[i].todo);
                      // 行にオブジェクトを生成します
            var td_item = $('<td>').text(data[i].id);
            tr.append(td_item);
            var td_price = $('<td>').text(data[i].deadline);
            tr.append(td_price);
            var td_orders = $('<td>').text(data[i].todo);
            tr.append(td_orders);
            // 行のオブジェクトをテーブルに追加します
            $('#listbox').append(tr);
            }
      // 読み込みボタンを非表示化します
      })
      .fail(function(j,t,e){
        console.log('ajax通信ダメでした');
        console.log(e);
      });
      return false;
  };

  getDataAll();

  // データベースに書き込む？
  $('#submit').on('click',function() {
    console.log('Hello');
    const todo = $('#todo').val();
    const date = $('#date').val();
//     // console.log(todo);
//     // console.log(date);
//     var params = new URLSearchParams();
//     params.append('todo', todo);
//     params.append('date', date);
// axios.post('todo_create.php', params)
// .then(function(response){
//   console.log("response",response.config.data);
//   // var tr = $("<tr>");
//   //           // 行にオブジェクトを生成します
//   // var td_item = $('<td>').text(data[i].id);
//   // tr.append(td_item);
//   // var td_price = $('<td>').text(data[i].deadline);
//   // tr.append(td_price);
//   // var td_orders = $('<td>').text(data[i].todo);
//   // tr.append(td_orders);
//   // // 行のオブジェクトをテーブルに追加します
//   // $('#listbox').append(tr);
// })
// .catch(function(error){
//   console.log("error",error);
// })
// .finally(function(){

// });
    $.ajax({
      url:"todo_create.php", //ここにデータを作るファイルのurl
      type:"POST",
      // dataType: 'json',
      data: {
        // 入力内容を送る 
        "todo": todo,
        "date": date
      },
      })
      .done(function(data, dataType) {
        console.log("success",data);
        })
        .fail(function(j,t,e){
          console.log('ajax通信ダメでした');
          console.log(e);
     });
return false;
 });

});