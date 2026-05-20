<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Association.php';
require_once __DIR__ . '/../modele/ActiviteProposee.php'; 
require_once __DIR__ . '/../modele/Manifestation.php';
require_once __DIR__ . '/../modele/RessourcesHumaines.php';


class AssociationDAO {
    private $db;
    private $table = 'association';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    public function getAllAssociations(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY nom_association");
        $associations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $associations[] = Association::fromArray($row);
        }
        return $associations;
    }

    public function getAssociationParId(int $id): ?Association {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_association = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? Association::fromArray($row) : null;
    }

public function ajouterAssociation(array $data): bool {
    $sql = "INSERT INTO {$this->table} 
        (nom_association, numero_recepisse, date_parution_jo, numero_insee, objet_association, adresse_siege_social, code_postal_siege_social, commune_siege_social, telephone_siege_social, email_siege_social, id_activite, id_manifestation, id_personne, id_ressources_humaines)
        VALUES (:nom, :recepisse, :parution, :insee, :objet, :adresse, :code_postal, :commune, :telephone, :email, :id_activite, :id_manifestation, :id_personne, :id_ressources_humaines)";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([
        ':nom' => $data['nom_association'] ?? '',
        ':recepisse' => $data['numero_recepisse'] ?? null,
        ':parution' => $data['date_parution_jo'] ?? null,
        ':insee' => $data['numero_insee'] ?? null,
        ':objet' => $data['objet_association'] ?? '',
        ':adresse' => $data['adresse_siege_social'] ?? '',
        ':code_postal' => $data['code_postal_siege_social'] ?? '',
        ':commune' => $data['commune_siege_social'] ?? '',
        ':telephone' => $data['telephone_siege_social'] ?? '',
        ':email' => $data['email_siege_social'] ?? '',
        ':id_activite' => $data['id_activite'] ?? null,
        ':id_manifestation' => $data['id_manifestation'] ?? null,
        ':id_personne' => $data['id_personne'] ?? null,
        ':id_ressources_humaines' => $data['id_ressources_humaines'] ?? null,
    ]);
}


public function modifierAssociation(int $id, array $data): bool {
    $sql = "UPDATE association SET 
        nom_association = :nom,
        numero_recepisse = :recepisse,
        date_parution_jo = :date_jo,
        numero_insee = :insee,
        objet_association = :objet,
        adresse_siege_social = :adresse,
        code_postal_siege_social = :cp,
        commune_siege_social = :commune,
        telephone_siege_social = :tel,
        email_siege_social = :email,
        id_activite = :id_activite,
        id_manifestation = :id_manifestation,
        id_personne = :id_personne,
        id_ressources_humaines = :id_ressources_humaines
    WHERE id_association = :id";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        ':nom' => $data['nom_association'],
        ':recepisse' => $data['numero_recepisse'],
        ':date_jo' => $data['date_parution_jo'],
        ':insee' => $data['numero_insee'],
        ':objet' => $data['objet_association'],
        ':adresse' => $data['adresse_siege_social'],
        ':cp' => $data['code_postal_siege_social'],
        ':commune' => $data['commune_siege_social'],
        ':tel' => $data['telephone_siege_social'],
        ':email' => $data['email_siege_social'],
        ':id_activite' => $data['id_activite'] ?? null,
        ':id_manifestation' => $data['id_manifestation'] ?? null,
        ':id_personne' => $data['id_personne'] ?? null,
        ':id_ressources_humaines' => $data['id_ressources_humaines'] ?? null,
        ':id' => $id
    ]);
}


    public function supprimerAssociationParId(int $id): bool {
        // Cette suppression ne gère que la table "association".
        // Si vous avez des dépendances (clés étrangères) dans d'autres tables (ex: subventions),
        // assurez-vous que votre schéma de base de données gère CASCADE ou SET NULL.
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_association = :id");
        return $stmt->execute([':id' => $id]);
    }
}