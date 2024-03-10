<?php

include '../Controller/programmeC.php';

$error = "";

// create programme
$programme = null;

// create an instance of the controller
$programmeC = new programmeC();
if (
    isset($_POST["objectif"]) &&
    isset($_POST["idExercice"]) 
    
) {
    if (
        !empty($_POST['objectif']) &&
        !empty($_POST["idExercice"]) 
        
    ) {
        $programme = new programme(
            null,
            $_POST['objectif'],
            $_POST['idExercice']
            
        );
        $programmeC->addProgram($programme);
        header('Location:ListProgram.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="ListProgram.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="objectif">objectif:
                    </label>
                </td>
                <td><input type="text" name="objectif" id="objectif" minlength="11" maxlength="50"></td>
            </tr>
            <tr>
                <td>
                    <label for="idExercice">ID Exercice:
                    </label>
                </td>
                <td><input type="text" name="idExercice" id="idExercice" maxlength="20"></td>
            </tr>
            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <script>
        // Récupérer la référence de l'élément d'entrée de texte
const objectifInput = document.getElementById('objectif');

// Définir la longueur minimale et maximale acceptée pour le texte
const minLength = 11;
const maxLength = 50;

// Ajouter un écouteur d'événement pour vérifier la saisie utilisateur
objectifInput.addEventListener('input', function() {
  // Récupérer la valeur actuelle du champ de saisie
  const inputValue = objectifInput.value.trim();

  // Vérifier si la longueur du texte est valide
  if (inputValue.length < minLength || inputValue.length > maxLength) {
    // Afficher un message d'erreur si la longueur est invalide
    objectifInput.setCustomValidity(`Le texte doit contenir entre ${minLength} et ${maxLength} caractères.`);
  } else {
    // Réinitialiser le message d'erreur s'il est valide
    objectifInput.setCustomValidity('');
  }
});
</script>
</body>

</html>