<!--controller-->
<?php
include '../config.php';
include '../model/solution.php';

class solutionc{
    public function listsolution(){
        $sql="SELECT * from solution";
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query($sql);
        return $list;
        }
        catch(Exeption $e){
            die('Erreur'.$e->getMeesage());
        }
    }

    function addsolution($solution) {
        $sql = "INSERT INTO solution(skintype, product, producttype)
                VALUES (:skintype, :product, :producttype)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'skintype' => $solution->getSkinType(),
                'product' => $solution->getProduct(),
                'producttype' => $solution->getProductType()
            ]);
            echo "les informations ont été ajoutées avec succès";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    


    public function Deletesolution($id)
    {

        $sql = "DELETE FROM solution WHERE id=:id ";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();

            echo "les informations ont été supproimé avec succés";
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function updatesolution($solution)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE solution SET 
                skintype = :skintype,
                product = :product, 
                producttype = :producttype
            WHERE id = :id'
        );
        $query->execute([
            'id' => $solution->getId(),
            'skintype' => $solution->getSkinType(),
            'product' => $solution->getProduct(),
            'producttype' => $solution->getProductType(),
        ]);
        echo $query->rowCount() . " Informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    

}


?>