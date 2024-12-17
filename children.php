<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 

        body {
            font-family: 'Georgia', serif;
            background-size: cover;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background: #fff;
            border: 2px solid #b22222;
            border-radius: 15px;
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            background-image: url('https://www.transparenttextures.com/patterns/white-diamond.png');
        }
        .card h2 {
            color: #228b22;
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        .card p {
            font-size: 15px;
            color: #444;
            line-height: 1.5;
        }

        .age {
            font-style: italic;
            color: #8b0000;
            font-size: 20px;
        }

        h1 {
            text-align: center;
            color: #b22222;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>        
    <?php
        require "Database.php";
        $config = require("config.php");
        $db = new Database($config["database"]);

        $childs = $db->query("SELECT * FROM children")->fetchAll();
        $letters = $db->query("SELECT * FROM letters")->fetchAll();

        echo "<div class='card-container'>";
        foreach ($childs as $child) {
            foreach ($letters as $letter) {
                if ($child['id'] === $letter['sender_id']) {
                    echo "<div class='card'>";
                    echo "<h2>" . htmlspecialchars($child['firstname']) . " " . htmlspecialchars($child['surname']) . "</h2>";
                    echo "<div class='age'>Vecums: " . htmlspecialchars($child['age']) . "</div>";
                    echo "<p>" . nl2br(htmlspecialchars($letter['letter_text'])) . "</p>";
                    echo "</div>";
                }
            }
        }
        echo "</div>";
    ?>
</body>
</html>
