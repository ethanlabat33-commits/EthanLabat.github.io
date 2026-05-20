<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Charge.php';

class ChargeDAO {
    private $db;
    private $table = 'charge';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllCharges() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_charge DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Charge::class);
    }

    public function ajouterCharge(array $data) {
        $sql = "INSERT INTO {$this->table} (description, montant_exercice_ecoule, montant_previsionnel, id_dossier, id_categorie_charge) 
                VALUES (:description, :montant_exercice_ecoule, :montant_previsionnel, :id_dossier, :id_categorie_charge)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':description' => $data['description'] ?? null,
            ':montant_exercice_ecoule' => $data['montant_exercice_ecoule'] ?? null,
            ':montant_previsionnel' => $data['montant_previsionnel'] ?? null,
            ':id_dossier' => $data['id_dossier'] ?? null,
            ':id_categorie_charge' => $data['id_categorie_charge'] ?? null
        ]);
    }

    public function modifierCharge(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
                    description = :description, 
                    montant_exercice_ecoule = :montant_exercice_ecoule, 
                    montant_previsionnel = :montant_previsionnel, 
                    id_dossier = :id_dossier, 
                    id_categorie_charge = :id_categorie_charge 
                WHERE id_charge = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':description' => $data['description'] ?? null,
            ':montant_exercice_ecoule' => $data['montant_exercice_ecoule'] ?? null,
            ':montant_previsionnel' => $data['montant_previsionnel'] ?? null,
            ':id_dossier' => $data['id_dossier'] ?? null,
            ':id_categorie_charge' => $data['id_categorie_charge'] ?? null,
            ':id' => $id
        ]);
    }

    public function supprimerCharge(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_charge = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getChargeById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_charge = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetchObject(Charge::class);

    }
}