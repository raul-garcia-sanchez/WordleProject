<?php echo gettype(isset($_POST["selectLenguage"]))?>
<form method="POST">
    <select id="selectLenguage" name="selectLenguage" onchange="this.form.submit()">
        <option value="ES" <?php if (isset($_POST["selectLenguage"])){
            if ($_POST["selectLenguage"]== "ES"){
                echo "selected";
            }}
            ?>>ES</option>
        <option value="CA" <?php if (isset($_POST["selectLenguage"])){
            if ($_POST["selectLenguage"]== "CA"){
                echo "selected";
            }}
            ?>>CA</option>
        <option value="EN" <?php if (isset($_POST["selectLenguage"])){
            if ($_POST["selectLenguage"]== "EN"){
                echo "selected";
            }}
            ?>>EN</option>
    </select>
</form>