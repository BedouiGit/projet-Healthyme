<?php
include '../Controller/ingredientc.php';
$ingredientc = new ingredientc();
$ingredientc->deleteingredient($_GET["idi"]);
header('Location:listingredients.php');





/*     <a href="listingredients.php">Back to list </a>
    <hr>

    <div id="error">
    <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    <table border="1" align="center">

    <tr>
        <td>
            <label for="idi">id:
            </label>
        </td>
        <td><input type="text" name="idi" id="idi" maxlength="20"></td>
    </tr>
    <tr>
        <td>
            <label for="nom">nom:
            </label>
        </td>
        <td><input type="text" name="nom" id="nom" maxlength="20"></td>
    </tr>
    <tr>
        <td>
            <label for="descriptioni">description:
            </label>
        </td>
        <td><input type="text" name="descriptioni" id="descriptioni" maxlength="20"></td>
    </tr>
    <tr>
        <td>
            <label for="categoriei">categorie:
            </label>
        </td>
        <td>
            <input type="text" name="categoriei" id="categoriei">
        </td>
    </tr>
    <tr>
        <td>
            <label for="prix">prix:
            </label>
        </td>
        <td>
            <input type="text" name="prix" id="prix">
        </td>
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
    </form> */