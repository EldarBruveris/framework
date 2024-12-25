<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    table, tr, td, th{
      border: 1px solid black;
    }
    table{
      width: 100%;
      border-collapse: collapse;
    }
    th{
      height: 50px;
    }
    td{
      text-align: center;
    }
    .btn{
    width: 450px;
    height: 100px;
    font-size: 26px;
    background-color: darkseagreen;
    color: #072829;
    border: none;
    border-radius: 20px;
    transition-duration: 0.3s;
    }
    .btn:hover{
    background-color: rgb(108, 143, 108);
    color: #bfd5d6;
    cursor: pointer;
    box-shadow: 6px 6px 5px black;
    transition-duration: 0.3s;
    }
    .buttons{
      margin-top: 100px;
      display: flex;
      flex-direction: column;
      height: 300px;
      justify-content: space-between;
    }
    .action-td{
      width: 100px;
      text-align: center;
    }
    .action-btn{
      display: inline-block;
      width: 80%;
      background-color: darkseagreen;
      color: #fff;
      text-decoration: none;
    } 
    
  </style>
</head>
<body>
    <table id="usersID">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
            <th colspan="3">Actions</th>
        </tr>
    <?php foreach($users as $key=>$value): ?>
        <tr>
          <td><?=$value->id;?></td>
          <td><?=$value->name;?></td>
          <td><?=$value->email;?></td>
          <td><?=$value->gender;?></td>
          <td><?=$value->status;?></td>
          <td class="action-td"><a href="/show" class="action-btn">show</a></td>
          <td class="action-td"><a href="" class="action-btn">edit</a></td>
          <td class="action-td"><a href="" class="action-btn">delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <section class="buttons">
      <a href="/users/new"><button class="btn">Добавить пользователя</button></a>
      <a href="/find"><button class="btn">Найти пользователя</button></a>
    </section>
</body>
</html>