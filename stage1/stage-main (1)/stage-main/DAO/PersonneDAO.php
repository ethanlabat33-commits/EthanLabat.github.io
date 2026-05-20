<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Personne.php';
require_once __DIR__ . '/../modele/RolePersonneAssociation.php';


class PersonneDAO {
    private $db;
    private $table = 'personne';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllPersonnes(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY nom_personne");
        $personnes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $personnes[] = Personne::fromArray($row);
        }
        return $personnes;
    }

    public function getPersonneParId(int $id): ?Personne {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_personne = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? Personne::fromArray($row) : null;
    }

    public function ajouterPersonne(array $data): bool {
        $sql = "INSERT INTO {$this->table} 
            (nom_personne, prenom, adresse, telephone, email, id_association, id_role)
            VALUES (:nom_personne, :prenom, :adresse, :telephone, :email, :id_association, :id_role)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom_personne' => $data['nom_personne'] ?? '',
            ':prenom' => $data['prenom'] ?? '',
            ':adresse' => $data['adresse'] ?? '',
            ':telephone' => $data['telephone'] ?? '',
            ':email' => $data['email'] ?? '',
            ':id_association' => $data['id_association'] ?? null,
            ':id_role' => $data['id_role'] ?? null,
        ]);
    }

    public function modifierPersonne(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
            nom_personne = :nom_personne,
            prenom = :prenom,
            adresse = :adresse,
            telephone = :telephone,
            email = :email,
            id_association = :id_association,
            id_role = :id_role
            WHERE id_personne = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom_personne' => $data['nom_personne'] ?? '',
            ':prenom' => $data['prenom'] ?? '',
            ':adresse' => $data['adresse'] ?? '',
            ':telephone' => $data['telephone'] ?? '',
            ':email' => $data['email'] ?? '',
            ':id_association' => $data['id_association'] ?? null,
            ':id_role' => $data['id_role'] ?? null,
            ':id' => $id,
        ]);
    }

    public function supprimerPersonneParId(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_personne = :id");
        return $stmt->execute([':id' => $id]);
    }
}
