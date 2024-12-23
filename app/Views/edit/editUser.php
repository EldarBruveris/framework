<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    
    <form action="/users" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?=$user->email;?>">

        <label for="name">Your first and last name:</label>
        <input type="text" id="name" name="name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <button type="submit" class="btn">Submit</button>
    </form>
</body>
</html>