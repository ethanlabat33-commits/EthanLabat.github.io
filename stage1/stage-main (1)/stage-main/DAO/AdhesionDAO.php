<?php
require_once __DIR__ . '/../config/accesDonnees.php';

class AdhesionDAO {
    private $db;
    private $table = 'adhesion';

    public function __construct() {
        // adapte la connexion selon ta config
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllAdhesions() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id_adhesion";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterAdhesion(float $montant, string $details, int $id_dossier, int $id_type_adhesion): bool {
        $sql = "INSERT INTO " . $this->table . " (montant, details, id_dossier, id_type_adhesion)
                VALUES (:montant, :details, :id_dossier, :id_type)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':montant' => $montant,
            ':details' => $details,
            ':id_dossier' => $id_dossier,
            ':id_type' => $id_type_adhesion
        ]);
    }

    public function modifierAdhesion(int $id, float $montant, string $details, int $id_dossier, int $id_type_adhesion): bool {
        $sql = "UPDATE " . $this->table . " 
                SET montant = :montant, details = :details, id_dossier = :id_dossier, id_type_adhesion = :id_type
                WHERE id_adhesion = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':montant' => $montant,
            ':details' => $details,
            ':id_dossier' => $id_dossier,
            ':id_type' => $id_type_adhesion,
            ':id' => $id
        ]);
    }

    public function supprimerAdhesionParId(int $id): bool {
        $sql = "DELETE FROM " . $this->table . " WHERE id_adhesion = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAdhesionParId(int $id): array|false {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_adhesion = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
