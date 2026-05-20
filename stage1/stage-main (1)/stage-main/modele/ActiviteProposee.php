<?php

class ActiviteProposee
{
    // Identifiant unique de l'activité (clé primaire)
    public int $id_activite;
    // Description textuelle de l'activité
    public string $description_activite;
    // Identifiant de l'association liée (nullable, peut être null si pas défini)
    public ?int $id_association = null;


    //Getter 
    /**
     * Getter pour l'identifiant de l'activité
     * 
     * @return int Retourne l'id unique de l'activité
     */
    public function getIdActivite(): int {
        return $this->id_activite;
    }

    /**
     * Getter pour la description de l'activité
     * 
     * @return string Retourne la description textuelle
     */
    public function getDescriptionActivite(): string {
        return $this->description_activite;
    }

    /**
     * Getter pour l'id de l'association liée
     * 
     * @return int|null Retourne l'id de l'association ou null si non défini
     */
    public function getIdAssociation(): ?int {
        return $this->id_association;
    }

    //Setter
    /**
     * Setter pour l'identifiant de l'activité
     * 
     * @param int $id_activite Définit l'id unique de l'activité
     */
    public function setIdActivite(int $id_activite): void {
        $this->id_activite = $id_activite;
    }
    /**
     * Setter pour la description de l'activité
     * 
     * @param string $description_activite Définit la description textuelle
     */
    public function setDescriptionActivite(string $description_activite): void { // <<< AJOUTEZ CE SETTER
        $this->description_activite = $description_activite;
    }
    /**
     * Setter pour l'id de l'association liée
     * 
     * @param int|null $id_association Définit l'id de l'association liée
     */
    public function setIdAssociation(?int $id_association): void {
        $this->id_association = $id_association;
    }


    /**
     * Méthode statique pour créer un objet ActiviteProposee à partir d'un tableau associatif
     * 
     * Utile si les données viennent d'un fetch(PDO::FETCH_ASSOC) ou d'une source similaire.
     * 
     * @param array $data Tableau associatif avec les clés correspondant aux propriétés
     * @return ActiviteProposee Objet ActiviteProposee rempli avec les données fournies
     */
    public static function fromArray(array $data): ActiviteProposee {
        $activite = new ActiviteProposee();

        // Affecte l'id de l'activité, ou null si la clé est absente dans le tableau
        $activite->id_activite = $data['id_activite'] ?? null;

        // Affecte la description de l'activité, chaîne vide si absente dans le tableau
        $activite->description_activite = $data['description_activite'] ?? '';

        // ... autres propriétés à affecter de la même manière si nécessaire ...

        return $activite;
    }
}