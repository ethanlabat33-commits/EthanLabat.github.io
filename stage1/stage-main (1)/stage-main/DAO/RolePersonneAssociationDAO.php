<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/RolePersonneAssociation.php';

class RolePersonneAssociationDAO {
    private $db;
    private $table = 'role_personne_association';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_role DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, RolePersonneAssociation::class);
    }

    public function ajouterRole(array $data) {
        $sql = "INSERT INTO {$this->table} (role) VALUES (:role)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':role' => trim($data['role'] ?? '')
        ]);
    }

    public function modifierRole(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET role = :role WHERE id_role = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':role' => trim($data['role']),
            ':id' => $id
        ]);
    }

    public function supprimerRole(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_role = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function getRoleParId(int $id): ?RolePersonneAssociation {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_role = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? RolePersonneAssociation::fromArray($row) : null;
    }
}