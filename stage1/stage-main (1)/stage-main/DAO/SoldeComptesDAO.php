<?php
require_once __DIR__ . '/../config/accesDonnees.php';

class SoldeCompteDAO {
    private $db;
    private string $table = 'solde_comptes';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAll(): array {
        $sql = "SELECT * FROM {$this->table} ORDER BY montant_solde DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouter(string $nom_compte, float $montant, int $id_dossier): bool {
        $sql = "INSERT INTO {$this->table} (nom_compte, montant_solde, id_dossier)
                VALUES (:nom, :montant, :id_dossier)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom_compte,
            ':montant' => $montant,
            ':id_dossier' => $id_dossier
        ]);
    }
}