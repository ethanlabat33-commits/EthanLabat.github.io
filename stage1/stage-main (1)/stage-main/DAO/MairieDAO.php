<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Mairie.php';

class MairieDAO {
    private $db;
    private $table = 'mairie';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllMairies(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY nom_mairie");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Mairie');
    }
    public function getMairieParId(int $id): ?Mairie {
    $sql = "SELECT * FROM {$this->table} WHERE id_mairie = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Mairie');
    $result = $stmt->fetch();

    return $result ?: null;
}

}
