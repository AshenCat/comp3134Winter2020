<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>igorsmd</title>
</head>
<body>
    <form method="get">
        <input type="text" name="inp">
        <button type="submit">Submit</button>
    </form>
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="menagerie";

        $conn=new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "select * lastname FROM users";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
                echo "id: ".$row["ID"]." - username ".$row["username"];
                echo "firstname: ".$row["firstname"]." - lastname ".$row["lastname"];
                echo "email: ".$row["email"]." - active ".$row["active"];
            }
        }
        else {
            echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>