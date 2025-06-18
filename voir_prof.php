<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "Cours_a_domicile"); // Remplace nom_de_ta_base

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête pour récupérer tous les professeurs
$sql = "SELECT * FROM professeurs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des professeurs</title>
    <style>
        .prof-card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .prof-card h3{
            color: green;
            margin-top: 0;
        }
        .prof-card p{
            margin: 5px 0;
        }
        .prof-card{
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .prof-card:hover{
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Professeurs disponibles</h1>
    <style>
        h1{
            text-align: center;
            color: rgb(10, 154, 238);
        }
    </style>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='prof-card'>";
            echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>";
            echo "<p><strong>Email :</strong>
            <a href='mailto:". htmlspecialchars($row['email']) ."'>
                <button>Envoyer un mail</button>
            </a></p>";
            echo "<p><strong>Matière :</strong> " . htmlspecialchars($row['matiere']) . "</p>";
            echo "<p><strong>Ville :</strong> " . htmlspecialchars($row['ville']) . "</p>";
            echo "<p><strong>Description :</strong> " . nl2br(htmlspecialchars($row['description'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun professeur trouvé.</p>";
    }

    $conn->close();
    ?>
    <style>
        body{
            background-image: url(IMAGE/REUSSITE.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
            padding: 20px;
        }
        button{
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        button:hover{
            background-color: #0056b3;
        }
    </style>
</body>
</html>
