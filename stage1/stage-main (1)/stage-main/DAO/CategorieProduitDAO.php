<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/CategorieProduit.php';

class CategorieProduitDAO {
    private $db;
    private $table = 'categ_produit';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllCategoriesProduits() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_CategProduit DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, CategorieProduit::class);
    }

    public function ajouterCategorieProduit(array $data) {
        $sql = "INSERT INTO categ_produit (libelle_CategProduit) VALUES (:libelle_CategProduit)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':libelle_CategProduit' => trim($data['libelle_CategProduit'] ?? '')
        ]);
    }


    public function modifierCategorieProduit(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET libelle_CategProduit = :libelle_CategProduit WHERE id_CategProduit = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':libelle_CategProduit' => trim($data['libelle_CategProduit']),
            ':id' => $id
        ]);
    }

    public function supprimerCategorieProduit(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_CategProduit = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getCategorieProduitById(int $id) {
         $sql = "SELECT * FROM {$this->table} WHERE id_CategProduit = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategorieProduit::class);
        return $stmt->fetch();
    }
}