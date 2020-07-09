このアプリは，授業で作ったtodoリストに削除機能とログイン機能をつけたものになります

xamppで作ったテーブルは，user_tableとtodo_tableの２つです

user_table:{
  value:{
    id(int(12)) A.I, 
    u_name(varchar(128)), 
    u_pw(varchar(64)), 
    indent(date)
    }
  }

todo_table:{
  value:{
    id(int(12)) A.I, 
    u_name(varchar(128)), 
    todo(char(128)), 
    deadline(date), 
    create_at(date)
    }
  }

ログイン状態を保持するために，todo_tableの方にもu_nameが存在しており，
$_SESSION['u_name']で，ユーザー名を共有し，そのユーザーの入っているtodoリストを
抜き出すことで，その人個人のtodoリストを表示しました。

todo_read.phpのinputタグの中にidを入力して，削除ボタンを押すとそのtodoリストが削除できます。