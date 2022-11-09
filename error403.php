<?php
    http_response_code(403);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>ERROR 403</title>
</head>
<body class="body_error">
    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="./game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="./index.php"><strong>Go Home</strong></a>
                    <label class="switch">
                        <input id="checkBoxDarkMode" type="checkbox" onchange="changeTheme(),updateFormAndChangeTheme()">
                        <span class="slider">Dark Mode</span>
                    </label>

                </div>
            </li>
        </ul>
    </nav>
    <div>
        <h1 class="titleError">ERROR 403 FORBIDDEN</h1>
        <h3 class="descriptionError">Sorry, you're not allowed to acces this page</h3>
    </div>

    <script>

        function changeThemeCheckingCheckBox(){
            const query = window.matchMedia('(prefers-color-scheme: dark)');
            if (query.matches) {
                if (!document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }

            }
            else{

                if (document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }
            }

        }

        function updateFormAndChangeTheme(){
            if (!document.getElementById('checkBoxDarkMode').checked) {
                document.getElementById('inputDarkMode').value = "light";
            }
            else{
                document.getElementById('inputDarkMode').value = "dark";
            }
        }

        function changeTheme(){
            document.body.classList.toggle("dark-mode");

        }

        function changeToDarkOrLightMode(query){
            if (query.matches) {

                    if (!document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = true;

                        document.getElementById('inputDarkMode').value = "dark";
                        changeTheme();
                    }

                }
                else{

                    if (document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = false;

                        document.getElementById('inputDarkMode').value = "light";
                        changeTheme();

                    }
                }
        }

    </script>
    
</body>
</html>