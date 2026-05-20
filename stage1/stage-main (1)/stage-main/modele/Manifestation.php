<?php

class Manifestation
{
    public int $id_manifestation;
    public string $date_manifestation;
    public string $nom_manifestation;
    public string $statut_manifestation;
    public string $genre;
    public int $NombreEntre;
    public float $resultatFinancier;
    public ?int $id_dossier;
    public ?int $id_association = null; // <<< AJOUTEZ CETTE PROPRIÉTÉ SI ELLE N'EXISTE PAS

    // ... autres propriétés ...

    public function getIdManifestation(): int {
         return $this->id_manifestation; 
    }
    public function getDateManifestation(): string { 
        return $this->date_manifestation; 
    }
    public function getNomManifestation(): string {
         return $this->nom_manifestation; 
    }
    public function getStatutManifestation(): string {
         return $this->statut_manifestation; 
    }
    public function getGenre(): string {
         return $this->genre; 
    }
    public function getNombreEntre(): ?int {
         return $this->NombreEntre;
    }
    public function getResultatFinancier(): ?float {
         return $this->resultatFinancier; 
    }
    public function getIdDossier(): int {
         return $this->id_dossier; 
    }

    // Setters
    public function setDateManifestation(string $date_manifestation): void {
         $this->date_manifestation = $date_manifestation; 
    }
    public function setNomManifestation(string $nom_manifestation): void {
         $this->nom_manifestation = $nom_manifestation; 
    }
    public function setStatutManifestation(string $statut_manifestation): void {
         $this->statut_manifestation = $statut_manifestation; 
    }
    public function setGenre(string $genre): void {
         $this->genre = $genre; 
    }
    public function setNombreEntre(int $nombre_entre): void {
         $this->nombre_entre = $nombre_entre; 
    }
    public function setResultatFinancier(float $resultat_financier): void {
         $this->resultat_financier = $resultat_financier; 
    }
    public function setIdDossier(int $id_dossier): void {
         $this->id_dossier = $id_dossier; 
    }


    public function getIdAssociation(): ?int {
    return $this->id_association;
}

public function setIdAssociation(?int $id_association): void {
    $this->id_association = $id_association;
}
    public static function fromArray(array $data): Manifestation {
        $manifestation = new Manifestation();
        $manifestation->id_manifestation = $data['id_manifestation'] ?? null;
        $manifestation->id_activite = $data['id_activite'] ?? null;
        $manifestation->date_manifestation = $data['date_manifestation'] ?? ''; // Adapter
        $manifestation->nom_manifestation = $data['nom_manifestation'] ?? ''; // Adapter
        $manifestation->statut_manifestation = $data['statut_manifestation'] ?? ''; // Adapter
        $manifestation->genre = $data['genre'] ?? ''; // <<< AJOUTEZ CECI
        $manifestation->nombre_entre = $data['nombre_entre'] ?? ''; // <<< AJOUTEZ CECI
        // ... autres propriétés ...
        return $activite;
    }
}