<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/DossierSubvention.php';
require_once __DIR__ . '/../modele/Association.php';
require_once __DIR__ . '/../modele/Mairie.php';
require_once __DIR__ . '/../modele/Manifestation.php';

class DossierSubventionDAO {
    private $db;
    private $table = 'dossier_subvention';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id_dossier DESC");
        $dossiers = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dossiers[] = DossierSubvention::fromArray($row);
        }
        return $dossiers;
    }

    public function getById(int $id): ?DossierSubvention {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_dossier = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? DossierSubvention::fromArray($row) : null;
    }

    public function ajouter(array $data): bool {
        $sql = "INSERT INTO {$this->table} (
            annee_demande, date_depot, date_limite_depot, rib,
            copie_statut, recepisse_declaration, recepisse_prefecture_maj,
            pv_derniere_assemblee, derniers_extraits_compte,
            id_association, id_mairie, id_manifestation
        ) VALUES (
            :annee_demande, :date_depot, :date_limite_depot, :rib,
            :copie_statut, :recepisse_declaration, :recepisse_prefecture_maj,
            :pv_derniere_assemblee, :derniers_extraits_compte,
            :id_association, :id_mairie, :id_manifestation
        )";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':annee_demande' => $data['annee_demande'] ?? null,
            ':date_depot' => $data['date_depot'] ?? null,
            ':date_limite_depot' => $data['date_limite_depot'] ?? null,
            ':rib' => $data['rib'] ?? '',
            ':copie_statut' => $data['copie_statut'] ?? 0,
            ':recepisse_declaration' => $data['recepisse_declaration'] ?? 0,
            ':recepisse_prefecture_maj' => $data['recepisse_prefecture_maj'] ?? 0,
            ':pv_derniere_assemblee' => $data['pv_derniere_assemblee'] ?? 0,
            ':derniers_extraits_compte' => $data['derniers_extraits_compte'] ?? 0,
            ':id_association' => $data['id_association'] ?? null,
            ':id_mairie' => $data['id_mairie'] ?? null,
            ':id_manifestation' => $data['id_manifestation'] ?? null
        ]);
    }

    public function modifier(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
            annee_demande = :annee_demande,
            date_depot = :date_depot,
            date_limite_depot = :date_limite_depot,
            rib = :rib,
            copie_statut = :copie_statut,
            recepisse_declaration = :recepisse_declaration,
            recepisse_prefecture_maj = :recepisse_prefecture_maj,
            pv_derniere_assemblee = :pv_derniere_assemblee,
            derniers_extraits_compte = :derniers_extraits_compte,
            id_association = :id_association,
            id_mairie = :id_mairie,
            id_manifestation = :id_manifestation
        WHERE id_dossier = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':annee_demande' => $data['annee_demande'] ?? null,
            ':date_depot' => $data['date_depot'] ?? null,
            ':date_limite_depot' => $data['date_limite_depot'] ?? null,
            ':rib' => $data['rib'] ?? '',
            ':copie_statut' => $data['copie_statut'] ?? 0,
            ':recepisse_declaration' => $data['recepisse_declaration'] ?? 0,
            ':recepisse_prefecture_maj' => $data['recepisse_prefecture_maj'] ?? 0,
            ':pv_derniere_assemblee' => $data['pv_derniere_assemblee'] ?? 0,
            ':derniers_extraits_compte' => $data['derniers_extraits_compte'] ?? 0,
            ':id_association' => $data['id_association'] ?? null,
            ':id_mairie' => $data['id_mairie'] ?? null,
            ':id_manifestation' => $data['id_manifestation'] ?? null,
            ':id' => $id
        ]);
    }

    public function supprimer(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_dossier = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>