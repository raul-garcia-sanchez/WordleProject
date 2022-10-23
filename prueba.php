<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <select name="selectLenguage">
        <option <?php if ($_POST["selectLenguage"]== "ES"){
            echo "selected";
            }
            ?>
        value="ES">ES</option>
        <option <?php if ($_POST["selectLenguage"]== "CA"){
            echo "selected";
            }
            ?>
        value="CA">CA</option>
        <option <?php if ($_POST["selectLenguage"]== "EN"){
            echo "selected";
            }
            ?>
        value="EN">EN</option>
    </select>
</form>
</body>
</html>