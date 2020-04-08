<?php
    session_start();
    $_SESSION['confirmation'] = "12wa2c34vqa"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSRF PLS</title>
</head>
<body>
    <form action="/lab8/csrf_action.php" method="POST">
        <input type="username" name="username" value="host">
        <input type="password" name="password" value="pass">
        <input type="hidden" name="confirmation" value=<?php echo "\"".$_SESSION['confirmation']."\""?>>
        <button type="submit" value="submit">submit</button>
    </form>
    <script>
        document.forms[0].submit();
    </script>
</body>
</html>