<?php
require_once __DIR__ . '/../config/accesDonnees.php';

class FinancementProjetDAO {
    private $db;
    private string $table = 'financement_projet';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAll(): array {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_financement DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouter(string $type_financement, float $montant_sollicite, int $id_dossier): bool {
        $sql = "INSERT INTO {$this->table} (type_financement, montant_sollicite, id_dossier)
                VALUES (:type_financement, :montant_sollicite, :id_dossier)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':type_financement' => $type_financement,
            ':montant_sollicite' => $montant_sollicite,
            ':id_dossier' => $id_dossier
        ]);
    }
}
