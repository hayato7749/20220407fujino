<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>
<style>
  body{
    background:#191970;
  }
  .main{
    background:white;
    position: absolute;
    top: 50%;
    left: 50%;
    argin-right: -50%;
    transform: translate(-50%, -50%);
    padding:20px;
    border-radius:10px;
  }
  h1{
    font-size:25px;
    margin-bottom:10px;
  }
  input{
    border:solid 1px #d3d3d3;
    border-radius:3px;
  }
  .create-input{
    width:70%;
    height:30px;
    margin-right:70px;
    margin-bottom:20px;
  }
  .content-input{
    height:20px;
    width:100%;
  }
  table{
    width:100%;
  }
  .content-th{
    width:30%;
  }
  .date-th{
    width:40%;
  }
  td{
    padding:5px 20px;
  }
  .update-td{
    display:flex;
    justify-content:center;
  }
  .date{
    padding:5px 40px;
  }
  button{
    background:white;
    padding:5px 10px;
    border-radius:5px;
  }
  .create-button{
    color:purple;
    border-color:purple;
  }
  .update-button{
    color:orange;
    border-color:orange;
  }
  .delete-button{
    color:aquamarine;
    border-color:aquamarine;
    margin-left:10px;
  }
</style>
<body>
  <div class="main">
    <h1>Todo List</h1>
    <form action="/todo/create" method="post">
      @csrf
      <input type="text" name="content" class=create-input>
      <button class=create-button>追加</button>
    </form>
    <table>
    <tr>
      <th class=date-th>作成日</th>
      <th class=content-th>タスク名</th>
      <th class=update-th>更新</th>
      <th class=delete-th>削除</th>
    </tr>
    @foreach ($items as $item)
      <tr>
        <td class=date>
          {{$item->created_at}}
        </td>
        <td>
          <input type="text" name="content" value="{{$item->content}}" class=content-input>
        </td>
        <td class=update-td>
          <button class=update-button formaction="{{route('update',['id' =>$item->id])}}">更新</button>
        </td>
        <td class=delete-td>
          <form method="POST" action="{{route('delete',['id'=>$item->id])}}">
            @csrf
            <button type="submit" class=delete-button>削除</button>
          </form>
        </td>
      </tr>
    @endforeach
    </table>
  </div>
</body>
</html>