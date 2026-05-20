<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/BilanFinancier.php';

class BilanFinancierDAO {
    private $db;
    private $table = 'bilan_financier';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllBilans() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_bilan_financier DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, BilanFinancier::class);
    }

    public function ajouterBilan(array $data) {
        $sql = "INSERT INTO {$this->table} (annee_exercice, total_charges_exercice_ecoule, total_charges_previsionnel, total_produits_exercice_ecoule, total_produits_previsionnel, resultat_exercice_ecoule, resultat_previsionnel, id_dossier) 
                VALUES (:annee_exercice, :total_charges_exercice_ecoule, :total_charges_previsionnel, :total_produits_exercice_ecoule, :total_produits_previsionnel, :resultat_exercice_ecoule, :resultat_previsionnel, :id_dossier)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':annee_exercice' => $data['annee_exercice'] ?? 0,
            ':total_charges_exercice_ecoule' => $data['total_charges_exercice_ecoule'] ?? 0.0,
            ':total_charges_previsionnel' => $data['total_charges_previsionnel'] ?? 0.0,
            ':total_produits_exercice_ecoule' => $data['total_produits_exercice_ecoule'] ?? 0.0,
            ':total_produits_previsionnel' => $data['total_produits_previsionnel'] ?? 0.0,
            ':resultat_exercice_ecoule' => $data['resultat_exercice_ecoule'] ?? 0.0,
            ':resultat_previsionnel' => $data['resultat_previsionnel'] ?? 0.0,
            ':id_dossier' => $data['id_dossier'] ?? 0
        ]);
    }

    public function modifierBilan(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
                annee_exercice = :annee_exercice, 
                total_charges_exercice_ecoule = :total_charges_exercice_ecoule, 
                total_charges_previsionnel = :total_charges_previsionnel, 
                total_produits_exercice_ecoule = :total_produits_exercice_ecoule, 
                total_produits_previsionnel = :total_produits_previsionnel, 
                resultat_exercice_ecoule = :resultat_exercice_ecoule, 
                resultat_previsionnel = :resultat_previsionnel, 
                id_dossier = :id_dossier 
                WHERE id_bilan_financier = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':annee_exercice' => $data['annee_exercice'],
            ':total_charges_exercice_ecoule' => $data['total_charges_exercice_ecoule'],
            ':total_charges_previsionnel' => $data['total_charges_previsionnel'],
            ':total_produits_exercice_ecoule' => $data['total_produits_exercice_ecoule'],
            ':total_produits_previsionnel' => $data['total_produits_previsionnel'],
            ':resultat_exercice_ecoule' => $data['resultat_exercice_ecoule'],
            ':resultat_previsionnel' => $data['resultat_previsionnel'],
            ':id_dossier' => $data['id_dossier'],
            ':id' => $id
        ]);
    }

    public function supprimerBilan(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_bilan_financier = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getBilanById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_bilan_financier = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}