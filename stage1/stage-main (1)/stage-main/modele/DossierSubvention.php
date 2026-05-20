<?php

class DossierSubvention {
    public int $id_dossier;
    public ?int $annee_demande;
    public ?string $date_depot;
    public ?string $date_limite_depot;
    public ?string $rib;
    public ?bool $copie_statut;
    public ?bool $recepisse_declaration;
    public ?bool $recepisse_prefecture_maj;
    public ?bool $pv_derniere_assemblee;
    public ?bool $derniers_extraits_compte;
    public ?int $id_association;
    public ?int $id_mairie;
    public ?int $id_manifestation;

    public function __construct() {
        // Laisser vide si vous utilisez PDO::FETCH_CLASS sans constructeur
    }

    // Getters
    public function getIdDossier(): int { return $this->id_dossier; }
    public function getAnneeDemande(): ?int { return $this->annee_demande; }
    public function getDateDepot(): ?string { return $this->date_depot; }
    public function getDateLimiteDepot(): ?string { return $this->date_limite_depot; }
    public function getRib(): ?string { return $this->rib; }
    public function getCopieStatut(): ?bool { return $this->copie_statut; }
    public function getRecepisseDeclaration(): ?bool { return $this->recepisse_declaration; }
    public function getRecepissePrefectureMaj(): ?bool { return $this->recepisse_prefecture_maj; }
    public function getPvDerniereAssemblee(): ?bool { return $this->pv_derniere_assemblee; }
    public function getDerniersExtraitsCompte(): ?bool { return $this->derniers_extraits_compte; }
    public function getIdAssociation(): ?int { return $this->id_association; }
    public function getIdMairie(): ?int { return $this->id_mairie; }
    public function getIdManifestation(): ?int { return $this->id_manifestation;}

    // Setters
    public function setIdDossier(?int $id_dossier): void { $this->id_dossier = $id_dossier; }
    public function setAnneeDemande(?int $annee_demande): void { $this->annee_demande = $annee_demande; }
    public function setDateDepot(?string $date_depot): void { $this->date_depot = $date_depot; }
    public function setDateLimiteDepot(?string $date_limite_depot): void { $this->date_limite_depot = $date_limite_depot; }
    public function setRib(?string $rib): void { $this->rib = $rib; }
    public function setCopieStatut(?bool $copie_statut): void { $this->copie_statut = $copie_statut; }
    public function setRecepisseDeclaration(?bool $recepisse_declaration): void { $this->recepisse_declaration = $recepisse_declaration; }
    public function setRecepissePrefectureMaj(?bool $recepisse_prefecture_maj): void { $this->recepisse_prefecture_maj = $recepisse_prefecture_maj; }
    public function setPvDerniereAssemblee(?bool $pv_derniere_assemblee): void { $this->pv_derniere_assemblee = $pv_derniere_assemblee; }
    public function setDerniersExtraitsCompte(?bool $derniers_extraits_compte): void { $this->derniers_extraits_compte = $derniers_extraits_compte; }
    public function setIdAssociation(?int $id_association): void { $this->id_association = $id_association; }
    public function setIdMairie(?int $id_mairie): void { $this->id_mairie = $id_mairie; }
    public function setIdManifestation(?int $id_manifestation): void { $this->id_manifestation = $id_manifestation;}


        public static function fromArray(array $data): self {
        $instance = new self();
        $instance->id_dossier = $data['id_dossier'] ?? null;
        $instance->annee_demande = $data['annee_demande'] ?? null;
        $instance->date_depot = $data['date_depot'] ?? null;
        $instance->date_limite_depot = $data['date_limite_depot'] ?? null;
        $instance->rib = $data['rib'] ?? null;
        $instance->copie_statut = $data['copie_statut'] ?? 0;
        $instance->recepisse_declaration = $data['recepisse_declaration'] ?? 0;
        $instance->recepisse_prefecture_maj = $data['recepisse_prefecture_maj'] ?? 0;
        $instance->pv_derniere_assemblee = $data['pv_derniere_assemblee'] ?? 0;
        $instance->derniers_extraits_compte = $data['derniers_extraits_compte'] ?? 0;
        $instance->id_association = $data['id_association'] ?? null;
        $instance->id_mairie = $data['id_mairie'] ?? null;
        $instance->id_manifestation = $data['id_manifestation'] ?? null;
        return $instance;
    }
}
