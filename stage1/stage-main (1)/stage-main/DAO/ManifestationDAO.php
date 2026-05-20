<?php
require_once __DIR__ . '/../config/accesDonnees.php';
require_once __DIR__ . '/../modele/Manifestation.php';

class ManifestationDAO {
    private $db;
    private $table = 'manifestation';

    public function __construct() {
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }
    /**
     * Récupère toutes les activités proposées.
     * @return Manifestation[] Un tableau d'objets ActiviteProposee.
     */
    public function getAllManifestations(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY nom_manifestation");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Manifestation');
    }

    /**
     * Récupère une activité par son ID.
     * @param int $id L'ID de l'activité.
     * @return Manifestation|null L'objet ActiviteProposee ou null si non trouvé.
     */
    public function getManifestationParId(int $id): ?Manifestation {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_manifestation = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $manifestation = new Manifestation();
            $manifestation->setIdManifestation($row['id_manifestation']);
            $manifestation->setNomManifestation($row['nom_manifestation']);
            return $manifestation;
        }
        return null;
    }

    public function modifierManifestation(int $id, array $data): bool {
        $sql = "UPDATE {$this->table} SET 
            date_manifestation = :date_manif,
            nom_manifestation = :nom,
            statut_manifestation = :statut,
            genre = :genre,
            NombreEntre = :nbEntre
        WHERE id_manifestation = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':date_manif' => $data['date_manifestation'],
            ':nom' => $data['nom_manifestation'],
            ':statut' => $data['statut_manifestation'],
            ':genre' => $data['genre'],
            ':nbEntre' => intval($data['NombreEntre']),
            ':id' => $id
        ]);
    }
    
    public function ajouterManifestation(array $data): bool {
    $sql = "INSERT INTO manifestation (
        date_manifestation, nom_manifestation, statut_manifestation, genre,
        NombreEntre, resultatFinancier
    ) VALUES (
        :date_manifestation, :nom, :statut, :genre, :nombre, :resultat
    )";

    $stmt = $this->db->prepare($sql);
    return $stmt->execute([
        ':date_manifestation' => $data['date_manifestation'],
        ':nom' => $data['nom_manifestation'],
        ':statut' => $data['statut_manifestation'],
        ':genre' => $data['genre'],
        ':nombre' => $data['NombreEntre'],
        ':resultat' => $data['resultatFinancier'],

    ]);
}

    public function supprimerManifestation(int $id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_manifestation = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getManifestationById(int $id) {
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_manifestation = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif ou false
}

public function getManifestationByAssociationId(int $idAssociation): ?Manifestation {
    $sql = "SELECT * FROM manifestation WHERE id_association = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $idAssociation]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $manifestation = new Manifestation();
        $manifestation->setIdManifestation($row['id_manifestation']);
        $manifestation->setNomManifestation($row['nom_manifestation']);
        // Ajoute d'autres setters ici si besoin
        return $manifestation;
    }
    return null;
}



}
