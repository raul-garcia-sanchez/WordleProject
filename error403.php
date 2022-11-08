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
                        <input id="checkBoxDarkMode" type="checkbox" onchange="changeTheme()">
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


        function changeTheme(){
            document.body.classList.toggle("dark-mode");

        }

        function changeToDarkOrLightMode(query){
            if (query.matches) {

                    if (!document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = true;
                        // $_SESSION["dark"] = true;
                        // $_SESSION["light"] = false;
                        changeTheme();
                    }

                }
                else{

                    if (document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = false;
                        // $_SESSION["dark"] = false;
                        // $_SESSION["light"] = true;
                    }
                }
        }

        
        const query = window.matchMedia('(prefers-color-scheme: dark)');
        changeToDarkOrLightMode(query);
        query.addListener(changeToDarkOrLightMode);

        

        
        
    </script>
    
</body>
</html>