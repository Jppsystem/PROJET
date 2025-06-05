<?php
$conn = new mysqli("localhost", "root", "", "Cours_a_domicile");

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$sql = "SELECT * FROM professeurs";
$result = $conn->query($sql);

echo "<h1>Liste des professeurs disponibles</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:10px;'>";
        echo "<h3>" . htmlspecialchars($row["nom"]) . "</h3>";
        echo "<p><strong>Matière : </strong>" . htmlspecialchars($row["matiere"]) . "</p>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "Aucun professeur trouvé.";
}

$conn->close();
?>
