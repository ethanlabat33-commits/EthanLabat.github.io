<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Produit.php';

class ProduitDAO {
    private $db;
    private $table = 'produit';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllProduits() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_produit DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Produit::class);
    }

    public function ajouterProduit(array $data) {
        $sql = "INSERT INTO {$this->table} (description, montant_exercice_ecoule, montant_previsionnel, id_dossier, id_CategProduit) 
                VALUES (:description, :montant_exercice_ecoule, :montant_previsionnel, :id_dossier, :id_CategProduit)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':description' => trim($data['description'] ?? ''),
            ':montant_exercice_ecoule' => $data['montant_exercice_ecoule'] ?? null,
            ':montant_previsionnel' => $data['montant_previsionnel'] ?? null,
            ':id_dossier' => $data['id_dossier'] ?? null,
            ':id_CategProduit' => $data['id_CategProduit'] ?? null
        ]);
    }

    public function modifierProduit(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
                    description = :description, 
                    montant_exercice_ecoule = :montant_exercice_ecoule, 
                    montant_previsionnel = :montant_previsionnel, 
                    id_dossier = :id_dossier, 
                    id_CategProduit = :id_CategProduit 
                WHERE id_produit = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':description' => trim($data['description']),
            ':montant_exercice_ecoule' => $data['montant_exercice_ecoule'] ?? null,
            ':montant_previsionnel' => $data['montant_previsionnel'] ?? null,
            ':id_dossier' => $data['id_dossier'] ?? null,
            ':id_CategProduit' => $data['id_CategProduit'] ?? null,
            ':id' => $id
        ]);
    }

    public function supprimerProduit(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_produit = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getProduitById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_produit = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}