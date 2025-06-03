<?php
$conn = new mysqli("localhost", "root", "", "Cours_a_domicile");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM professeurs");

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2>" . htmlspecialchars($row['nom']) . " - " . htmlspecialchars($row['matiere']) . "</h2>";
    echo "<p>Ville : " . htmlspecialchars($row['ville']) . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
    echo "</div><hr>";
}

$conn->close();
?>