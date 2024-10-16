<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="shortcut icon" href="./logoo.png" type="image/x-icon" class="logo">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            color: white;
            background-image: url(./bg3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;

        }

        .cont {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 50px;
            text-align: center;
            width: 80%;
            position: relative;
            left: 80px;
        }

        #thanks h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 0.5em;
        }

        #thanks h2 {
            font-size: 1.5em;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="cont">
        <div id="thanks">
            <h1>Thank you for your Enrollment!</h1>
            <?php
                if (isset($_GET['name'])) {
                    $name = htmlspecialchars($_GET['name']);
                    echo "<h2>We hope you enjoy our GYM experience, $name.</h2>";
                } else {
                    echo "<h2>We hope you enjoy our GYM experience.</h2>";
                }
            ?>
        </div>
    </div>
</body>

</html>
