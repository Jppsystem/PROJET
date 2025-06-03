<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "Cours_a_domicile");
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données
$nom = $_POST['nom'];
$matiere = $_POST['matiere'];
$ville = $_POST['ville'];
$description = $_POST['description'];

// Préparer et exécuter la requête
$sql = "INSERT INTO professeurs (nom, email, matiere, ville, tarif, description)
        VALUES ('$nom', '$matiere', '$ville','$description')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $conn->error;
}

$conn->close();
?>

