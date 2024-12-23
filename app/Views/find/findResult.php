<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      text-align: center;
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
    margin-top: 250px;
    padding: 35px 75px;
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
  </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
        </tr>
        <tr>
          <td><?=$user->id;?></td>
          <td><?=$user->name;?></td>
          <td><?=$user->email;?></td>
          <td><?=$user->gender;?></td>
          <td><?=$user->status;?></td>
        </tr>
    </table>
    <a href="/users/edit/<?=$user->id;?>"><button class="btn">Редактировать</button></a>
</body>
</html>