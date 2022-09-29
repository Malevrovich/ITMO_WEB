<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bruh...</title>
        <link rel="stylesheet" href='../css/typography.css'>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                text-align: center;
                background-color: black;
                height: 95vh;
            }
        </style>
    </head>
    <body>
        <h1>Are you trying to break my lab???</h1>
        <?php
            echo "<p> Error ";
            echo htmlspecialchars($_REQUEST['code']);
            echo "</p>";
            if($_REQUEST['code'] == '404') {
                echo "<p> Page Not Found </p>";
            }
            if($_REQUEST['code'] == '400') {
                echo "<p> Invalid Arguments! </p>";
                echo "<p> x must be integer [-3; 5] </p>";
                echo "<p> y must be float in (-5; 5) </p>";
                echo "<p> r must be in {1, 1.5, 2, 2.5, 3} </p>";
            }
            if($_REQUEST['code'] == '405') {
                echo "<p> Wrong Method! (USE POST) </p>";
            }
            if($_REQUEST['code'] == '500') {
                echo "<p> Server is dead </p>";
            }
        ?>
    </body>
</html>