<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/RessourcesHumaines.php';

class RessourcesHumainesDAO {
    private $db;
    private $table = 'ressources_humaines';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllRessourcesHumaines() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id_ressources_humaines DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, RessourcesHumaines::class);
    }

public function ajouterRessourcesHumaines(array $data) {
    $sql = "INSERT INTO ressources_humaines (
        nombre_benevoles, 
        nombre_salaries_total, 
        nombre_salaries_autres, 
        nombre_salaries_temps_complet, 
        nombre_salaries_temps_non_complet, 
        nombre_heures_hebdomadaires_salaries, 
        id_dossier
    ) VALUES (
        :nombre_benevoles, 
        :nombre_salaries_total, 
        :nombre_salaries_autres, 
        :nombre_salaries_temps_complet, 
        :nombre_salaries_temps_non_complet, 
        :nombre_heures_hebdomadaires_salaries, 
        :id_dossier
    )";

    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute([
        ':nombre_benevoles' => intval($data['nombre_benevoles'] ?? 0),
        ':nombre_salaries_total' => intval($data['nombre_salaries_total'] ?? 0),
        ':nombre_salaries_autres' => intval($data['nombre_salaries_autres'] ?? 0),
        ':nombre_salaries_temps_complet' => intval($data['nombre_salaries_temps_complet'] ?? 0),
        ':nombre_salaries_temps_non_complet' => intval($data['nombre_salaries_temps_non_complet'] ?? 0),
        ':nombre_heures_hebdomadaires_salaries' => intval($data['nombre_heures_hebdomadaires_salaries'] ?? 0),
        ':id_dossier' => intval($data['id_dossier'] ?? 0)
    ]);

    if ($result) {
        return $this->db->lastInsertId();  // Attention : $this->db, pas $this->pdo !
    }

    return false;
}



    public function modifierRessourcesHumaines(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
            nombre_benevoles = :nombre_benevoles,
            nombre_salaries_total = :nombre_salaries_total,
            nombre_salaries_autres = :nombre_salaries_autres,
            nombre_salaries_temps_complet = :nombre_salaries_temps_complet,
            nombre_salaries_temps_non_complet = :nombre_salaries_temps_non_complet,
            nombre_heures_hebdomadaires_salaries = :nombre_heures_hebdomadaires_salaries,
            id_dossier = :id_dossier
        WHERE id_ressources_humaines = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nombre_benevoles' => intval($data['nombre_benevoles']),
            ':nombre_salaries_total' => intval($data['nombre_salaries_total']),
            ':nombre_salaries_autres' => intval($data['nombre_salaries_autres']),
            ':nombre_salaries_temps_complet' => intval($data['nombre_salaries_temps_complet']),
            ':nombre_salaries_temps_non_complet' => intval($data['nombre_salaries_temps_non_complet']),
            ':nombre_heures_hebdomadaires_salaries' => intval($data['nombre_heures_hebdomadaires_salaries']),
            ':id_dossier' => intval($data['id_dossier']),
            ':id' => $id
        ]);
    }

    public function supprimerRessourcesHumaines(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_ressources_humaines = :id");
        return $stmt->execute([':id' => $id]);
    }

public function getRessourcesHumainesById(int $id) {
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_ressources_humaines = :id");
    $stmt->execute([':id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, RessourcesHumaines::class);
    return $stmt->fetch();  // Cela retournera un objet RessourcesHumaines
}


    

    public function supprimerAssociationParId(int $id): bool {
        // Cette suppression ne gère que la table "association".
        // Si vous avez des dépendances (clés étrangères) dans d'autres tables (ex: subventions),
        // assurez-vous que votre schéma de base de données gère CASCADE ou SET NULL.
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_association = :id");
        return $stmt->execute([':id' => $id]);
    }
}