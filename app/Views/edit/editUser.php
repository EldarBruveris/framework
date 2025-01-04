<?php
    $genders = ["male" => "Male", "female" => "Female"];
    $statuses = ["active" => "Active", "inactive" => "Inactive"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .back-btn{
            align-self: flex-start;
            text-decoration: none;
            color: #000;
            font-size: 20px;
            background-color: darkseagreen;
            height: 35px;
            width: 250px;
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <a href="/users" class="back-btn">Вернуться к таблице</a>
    
    <form action="/users/:userID" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?=$user->email;?>">

        <label for="name">Your first and last name:</label>
        <input type="text" id="name" name="name" required value="<?=$user->name;?>">

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <?php foreach($genders as $value => $label):?>
            <option value="<?=$value?>" <?= $value === $user->gender ? "selected" : "";?>><?=$label?></option>
            <?php endforeach;?>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status" required">
        <?php foreach($statuses as $value => $label):?>
            <option value="<?=$value?>" <?= $value === $user->status ? "selected" : "";?>><?=$label?></option>
            <?php endforeach;?>
        </select>

        <button type="submit" class="btn" id="submitBtn">Submit</button>
    </form>
    <script>
        const userId = "<?= strval($user->id);?>";
        const userEmail = "<?= strval($user->email);?>";
        const userName = "<?= strval($user->name);?>";
        const userGender = "<?= strval($user->gender);?>";
        const userStatus = "<?= strval($user->status);?>";
        const button = document.getElementById("submitBtn");
        button.addEventListener('submit', (event) => {
            event.preventDefault()
            fetch(`http://localhost:8080/users/edit/${userId}`)
            .then((response) => {
            console.log('response: ', response)

            return response.json();
        })
        })

        
    </script>
</body>
</html>

