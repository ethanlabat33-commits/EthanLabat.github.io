<?php

class Personne
{
    public ?int $id_personne;
    public ?int $id_association;
    public ?int $id_role;
    public string $nom_personne;
    public string $prenom;
    public ?string $adresse;
    public ?string $telephone;
    public ?string $email;

    // Getters
    public function getIdPersonne(): ?int { return $this->id_personne; }
    public function getIdAssociation(): ?int { return $this->id_association; }
    public function getIdRole(): ?int { return $this->id_role; }
    public function getNom(): string { return $this->nom_personne; }
    public function getPrenom(): string { return $this->prenom; }
    public function getAdresse(): ?string { return $this->adresse; }
    public function getTelephone(): ?string { return $this->telephone; }
    public function getEmail(): ?string { return $this->email; }

    // Setters
    public function setIdPersonne(?int $id_personne): void { $this->id_personne = $id_personne; }
    public function setIdAssociation(?int $id_association): void { $this->id_association = $id_association; }
    public function setIdRole(?int $id_role): void { $this->id_role = $id_role; }
    public function setNom(string $nom): void { $this->nom_personne = $nom_personne; }
    public function setPrenom(string $prenom): void { $this->prenom = $prenom; }
    public function setAdresse(?string $adresse): void { $this->adresse = $adresse; }
    public function setTelephone(?string $telephone): void { $this->telephone = $telephone; }
    public function setEmail(?string $email): void { $this->email = $email; }

    // Hydratation depuis un tableau associatif
public static function fromArray(array $data): Personne
{
    $personne = new Personne();
    $personne->id_personne = $data['id_personne'] ?? null;
    $personne->id_association = $data['id_association'] ?? null;
    $personne->id_role = $data['id_role'] ?? null;

    // CORRIGÉ : adapter au nom de colonne réel
    $personne->nom_personne = $data['nom_personne'] ?? '';
    $personne->prenom = $data['prenom'] ?? '';
    $personne->adresse = $data['adresse'] ?? null;
    $personne->telephone = $data['telephone'] ?? null;
    $personne->email = $data['email'] ?? null;

    return $personne;
}
}
