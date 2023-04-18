<?php
include '../config.php';
include '../Model/exercice.php';

class exerciceC
{
    public function listExercice()
    {
        $sql = "SELECT * FROM exercice";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteExercice($id)
    {
        $sql = "DELETE FROM exercice WHERE ide = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addExercice($exercice)
    {
        $sql = "INSERT INTO exercice  
        VALUES (NULL, :nom,:cat)";
        $db = config::getConnexion();
        try {
            //print_r($exercice->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $exercice->getnomEx(),
                'cat' => $exercice->getCategorie(),
                //'dob' => $exercice->getDob()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateExercice($exercice, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE exercice SET 
                    nomEx = :nomEx, 
                    categorie = :categorie  
                    
                WHERE ide= :ide'
            );
            $query->execute([
                'ide' => $id,
                'nomEx' => $exercice->getnomEx(),
                'categorie' => $exercice->getCategorie()
                
                //'dob' => $client->getDob()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showExercice($id)
    {
        $sql = "SELECT * from exercice where ide = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $exercice = $query->fetch();
            return $exercice;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
