<?php

class Association
{   
    public ?int $id_activite;
    public ?int $id_manifestation;
    public ?int $id_personne;
    public ?int $id_ressources_humaines;
    public int $id_association;
    public string $nom_association;
    public ?string $numero_recepisse;
    public ?string $date_parution_jo;
    public ?string $numero_insee;
    public ?string $objet_association;
    public ?string $adresse_siege_social;
    public ?string $code_postal_siege_social;
    public ?string $commune_siege_social;
    public ?string $telephone_siege_social;
    public ?string $email_siege_social;

    // Supprimer 'public array $activitesLiees = [];'

    // Constructeur commenté (optionnel si tu utilises PDO::FETCH_CLASS)
    /*
    public function __construct(
        int $id_association,
        string $nom_association,
        string $numero_recepisse,
        string $date_parution_jo,
        string $numero_insee,
        string $objet_association,
        string $adresse_siege_social,
        string $code_postal_siege_social,
        string $commune_siege_social,
        string $telephone_siege_social,
        string $email_siege_social
    ) {
        $this->id_association = $id_association;
        $this->nom_association = $nom_association;
        $this->numero_recepisse = $numero_recepisse;
        $this->date_parution_jo = $date_parution_jo;
        $this->numero_insee = $numero_insee;
        $this->objet_association = $objet_association;
        $this->adresse_siege_social = $adresse_siege_social;
        $this->code_postal_siege_social = $code_postal_siege_social;
        $this->commune_siege_social = $commune_siege_social;
        $this->telephone_siege_social = $telephone_siege_social;
        $this->email_siege_social = $email_siege_social;
    }
    */

    // Getters existants
    public function getIdAssociation(): int { return $this->id_association; }
    public function getNomAssociation(): string { return $this->nom_association; }
    public function getNumeroRecepisse(): ?string { return $this->numero_recepisse; }
    public function getDateParutionJo(): ?string { return $this->date_parution_jo; }
    public function getNumeroInsee(): ?string { return $this->numero_insee; }
    public function getObjetAssociation(): ?string { return $this->objet_association; }
    public function getAdresseSiegeSocial(): ?string { return $this->adresse_siege_social; }
    public function getCodePostalSiegeSocial(): ?string { return $this->code_postal_siege_social; }
    public function getCommuneSiegeSocial(): ?string { return $this->commune_siege_social; }
    public function getTelephoneSiegeSocial(): ?string { return $this->telephone_siege_social; }
    public function getEmailSiegeSocial(): ?string { return $this->email_siege_social; }
    public function getIdActivite(): ?int { return $this->id_activite; } // <<< Ajouter ce getter
    public function getIdManifestation(): ?int { return $this->id_manifestation; }
    public function getIdPersonne(): ?int {
    return $this->id_personne;
}
    public function getIdRessource(): ?int{return $this->id_ressources_humaines;}

    // Setters existants
    public function setIdAssociation(int $id_association): void { $this->id_association = $id_association; }
    public function setNomAssociation(string $nom_association): void { $this->nom_association = $nom_association; }
    public function setNumeroRecepisse(?string $numero_recepisse): void { $this->numero_recepisse = $numero_recepisse; }
    public function setDateParutionJo(?string $date_parution_jo): void { $this->date_parution_jo = $date_parution_jo; }
    public function setNumeroInsee(?string $numero_insee): void { $this->numero_insee = $numero_insee; }
    public function setObjetAssociation(string $objet_association): void { $this->objet_association = $objet_association; }
    public function setAdresseSiegeSocial(string $adresse_siege_social): void { $this->adresse_siege_social = $adresse_siege_social; }
    public function setCodePostalSiegeSocial(string $code_postal_siege_social): void { $this->code_postal_siege_social = $code_postal_siege_social; }
    public function setCommuneSiegeSocial(string $commune_siege_social): void { $this->commune_siege_social = $commune_siege_social; }
    public function setTelephoneSiegeSocial(?string $telephone_siege_social): void { $this->telephone_siege_social = $telephone_siege_social; }
    public function setEmailSiegeSocial(?string $email_siege_social): void { $this->email_siege_social = $email_siege_social; }
    public function setIdActivite(?int $id_activite): void { $this->id_activite = $id_activite; }
    public function setIdManifestation(?int $id_manifestation):void { $this->id_manifestation = $id_manifestation;}
    public function setIdPersonne(?int $id_personne): void {
    $this->id_personne = $id_personne;
}
    public function setIdRessource(?int $id_ressources_humaines): void{$this->id_ressources_humaines =$id_ressources_humaines;}
         // <<< Ajouter ce setter

    // Méthode fromArray mise à jour pour inclure id_activite
    public static function fromArray(array $data): Association {
        $association = new Association();
        $association->id_association = $data['id_association'] ?? null;
        $association->nom_association = $data['nom_association'] ?? '';
        $association->numero_recepisse = $data['numero_recepisse'] ?? null;
        $association->date_parution_jo = $data['date_parution_jo'] ?? null;
        $association->numero_insee = $data['numero_insee'] ?? null;
        $association->objet_association = $data['objet_association'] ?? '';
        $association->adresse_siege_social = $data['adresse_siege_social'] ?? '';
        $association->code_postal_siege_social = $data['code_postal_siege_social'] ?? '';
        $association->commune_siege_social = $data['commune_siege_social'] ?? '';
        $association->telephone_siege_social = $data['telephone_siege_social'] ?? '';
        $association->email_siege_social = $data['email_siege_social'] ?? '';
        $association->id_activite = $data['id_activite'] ?? null; // <<< Inclure id_activite
        $association->id_manifestation = $data['id_manifestation'] ?? null;  // Ajoute cette ligne
        $association->id_personne = $data['id_personne'] ?? null;
        $association->id_ressources_humaines = $data['id_ressources_humaines'] ?? null;


        return $association;
    }
}