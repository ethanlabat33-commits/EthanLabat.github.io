<?php
// Inclusion du fichier qui permet la connexion à la base de données
require_once __DIR__ . '/../config/accesDonnees.php';
// Inclusion du modèle qui représente une activité proposée sous forme d'objet
require_once __DIR__ . '/../modele/ActiviteProposee.php';

class ActiviteProposeeDAO {
    private $db; // Variable qui contiendra la connexion PDO à la base de données
    private $table = 'activite_proposee'; // Nom de la table utilisée dans la base de données

    // Constructeur de la classe DAO.
    public function __construct() {
        // Connexion à la base de données à l'initialisation de l'objet
        $this->db = connexion('mysql:host=localhost;dbname=subvention;charset=utf8', 'root', '');
    }

    /**
     * Méthode pour récupérer toutes les activités enregistrées dans la base
     *
     * @return ActiviteProposee[] Retourne un tableau d'objets de type ActiviteProposee
     */
    public function getAllActivites(): array /** On utilise un tableau car plusieurs activités peuvent être retournées.*/ {
        // Requête SQL : sélectionne toutes les lignes de la table, triées par description
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY description_activite");
        // fetchAll avec FETCH_CLASS crée automatiquement des objets ActiviteProposee à partir des lignes
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ActiviteProposee');
    }

   /**
    * Méthode pour obtenir une activité en fonction de son identifiant (ID)
    *
    * @param integer $id ID de l'activité recherchée
    * @return ActiviteProposee|null  L'activité correspondante, ou null si non trouvée
    *
    * Ici, on utilise une requête préparée pour sécuriser l'exécution et éviter les injections SQL.
    */
    public function getActiviteParId(int $id): ?ActiviteProposee /** Retourne un objet ActiviteProposee si trouvé, sinon null.*/{
        // Requête préparée pour éviter les injections SQL (sécurité)
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_activite = :id");
        //Exécute une requête préparée
        $stmt->execute([':id' => $id]);
        // On récupère les données sous forme de tableau associatif
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
        // Création d'un nouvel objet ActiviteProposee et affectation des propriétés récupérées
            $activite = new ActiviteProposee();
            $activite->setIdActivite($row['id_activite']);
            $activite->setDescriptionActivite($row['description_activite']);
            return $activite;
        }
        // Aucun résultat : on retourne null
        return null;
    }

    /**
     * Méthode pour ajouter une nouvelle activité dans la base
     *
     * @param string $description La description fournie par l'utilisateur
     * @return boolean True si l'insertion a réussi, sinon False
     */
    public function ajouterActivite(string $description): bool {
        $sql = "INSERT INTO {$this->table} (description_activite) VALUES (:description)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':description' => $description]);
    }

    /**
     * Méthode pour modifier une activité existante
     *
     * @param integer $id L'identifiant de l'activité à modifier
     * @param string $description Le nouveau texte de description
     * @return boolean True si la mise à jour a réussi, sinon False
     */
    public function modifierActivite(int $id, string $description): bool {
        $sql = "UPDATE {$this->table} SET description_activite = :description WHERE id_activite = :id";
        $stmt = $this->db->prepare($sql);
        // Exécution de la requête SQL préparée en remplaçant les paramètres nommés :description et :id
        // - :description sera remplacé par la valeur de la variable $description
        // - :id sera remplacé par la valeur de la variable $id
        // La méthode execute() retourne true si la mise à jour s'est bien déroulée, sinon false
        return $stmt->execute([':description' => $description, ':id' => $id]);
    }

    /**
     * Méthode pour supprimer une activité grâce à son ID
     * @param int $id L'identifiant de l'activité à supprimer
     * @return bool True si la suppression a réussi, sinon False
     */
    public function supprimerActiviteParId(int $id): bool {
        // Suppression de la ligne dont l'ID correspond
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_activite = :id");
        // Exécute la requête préparée en liant la valeur de $id au paramètre nommé :id.
        // Cela permet de sécuriser la requête contre les injections SQL en séparant les données du code SQL.
        return $stmt->execute([':id' => $id]);
    }

}
