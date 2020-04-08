<?php
    session_start();
    $_SESSION['confirmation'] = "asd123asd";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        username: <input type="text" name="username" id="username" />
        password: <input type="text" name="password" id="password" />
        <button type="submit" value="submit">Submit</button>
    </form>
    <div>
        <?php
            if(isset($_POST['confirmation']) && $_POST['confirmation'] == $_SESSION['confirmation']){
                if(isset($_POST['username']) && isset($_POST['password'])) {
                    if($_POST['username'] == "host" && $_POST['password'] == "pass")
                    echo "<h1>SUCCESS!</h1>";
                    else echo "<h1>failed to authenticate</h2>";
                }
            } else echo "wrong confirmation";
        ?>
    </div>
    
</body>
</html>