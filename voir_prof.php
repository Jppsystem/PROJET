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
            border: 1px solid #ccc;
            padding: 15px;
            margin: 15px;
            border-radius: 8px;
            width: 400px;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Professeurs disponibles</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='prof-card'>";
            echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>";
            echo "<p><strong>Email :</strong> " . htmlspecialchars($row['email']) . "</p>";
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
            background-size: 100%;
        }
    </style>
</body>
</html>
