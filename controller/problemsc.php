<?php
include '../config.php';
include '../model/problems.php';

class problemsc{
    public function listproblems(){
        $sql="SELECT * from problems";
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query($sql);
        return $list;
        }
        catch(Exeption $e){
            die('Erreur'.$e->getMeesage());
        }
    }

    function addproblem($problems)  {
        
        $sql = "INSERT INTO problems(ID,skintype,problem)
        VALUES(:ID,:skintype,:problem)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            
            $query->execute([
                'ID' => (int)$problems->getID(),
                'skintype' => $problems->getSkinType(),
                'problem' => $problems->getProblem(),
            ]);
            echo"les informations ont été ajoutées avec succés";


        } catch(Exception $e){
            $e->getMessage();
        }
    }


    public function Deleteproblem($ID)
    {

        $sql = "DELETE FROM problems WHERE ID=:ID ";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ID', $ID);
            $req->execute();

            echo "les informations ont été supproimé avec succés";
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

  /*  function updateproblem($problems, $ID)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE problems SET 
                ID = :ID,
                skintype = :skintype, 
                problem = :problem
                 
            WHERE ID= :ID'
        );
        $query->execute([
            'ID' => $ID,
            'skintype' => $problems->getSkinType(),
            'problem' => $problems->getProblem(),
        ]);
        echo $query->rowCount() . " Informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}*/

function updateProblem($problems, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE problems SET 
                ID = :id,
                skintype = :skintype,
                problem = :problem 
            WHERE ID = :exid'
        );
        $query->execute([
            'exid' => $id,
            'id' => $problems->getID(),
            'skintype' => $problems->getSkinType(),
            'problem' => $problems->getProblem(),
        ]);
        echo $query->rowCount() . " informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}


}


?>