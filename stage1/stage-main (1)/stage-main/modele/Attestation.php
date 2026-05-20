<?php

class Attestation
{
    private int $id_attestation;
    private string $referent_association;
    private bool $accepte_diffusion;
    private bool $certifie_information;
    private bool $certifie_asso_declaree;
    private bool $certifie_reglementation;
    private bool $precises_versement;
    private string $lieu_signature;
    private string $date_signature;
    private string $signature;
    private int $id_dossier;
    private int $id_personne;

    public function __construct(
        int $id_attestation,
        string $referent_association,
        bool $accepte_diffusion,
        bool $certifie_information,
        bool $certifie_asso_declaree,
        bool $certifie_reglementation,
        bool $precises_versement,
        string $lieu_signature,
        string $date_signature,
        string $signature,
        int $id_dossier,
        int $id_personne
    ) {
        $this->id_attestation = $id_attestation;
        $this->referent_association = $referent_association;
        $this->accepte_diffusion = $accepte_diffusion;
        $this->certifie_information = $certifie_information;
        $this->certifie_asso_declaree = $certifie_asso_declaree;
        $this->certifie_reglementation = $certifie_reglementation;
        $this->precises_versement = $precises_versement;
        $this->lieu_signature = $lieu_signature;
        $this->date_signature = $date_signature;
        $this->signature = $signature;
        $this->id_dossier = $id_dossier;
        $this->id_personne = $id_personne;
    }

    // Getters
    public function getIdAttestation(): int { 
        return $this->id_attestation; 
    }
    public function getReferentAssociation(): string {
         return $this->referent_association; 
    }
    public function getAccepteDiffusion(): bool {
         return $this->accepte_diffusion; 
    }
    public function getCertifieInformation(): bool {
         return $this->certifie_information;
     }
    public function getCertifieAssoDeclaree(): bool { 
        return $this->certifie_asso_declaree; 
    }
    public function getCertifieReglementation(): bool {
         return $this->certifie_reglementation; 
    }
    public function getPrecisesVersement(): bool { 
        return $this->precises_versement;
     }
    public function getLieuSignature(): string { 
        return $this->lieu_signature; 
    }
    public function getDateSignature(): string { 
        return $this->date_signature; 
    }
    public function getSignature(): string { 
        return $this->signature; 
    }
    public function getIdDossier(): int { 
        return $this->id_dossier;
     }
    public function getIdPersonne(): int {
         return $this->id_personne; 
    }

    // Setters
    public function setIdAttestation(int $id_attestation): void {
         $this->id_attestation = $id_attestation; 
    }
    public function setReferentAssociation(string $referent_association): void {
         $this->referent_association = $referent_association;
     }
    public function setAccepteDiffusion(bool $accepte_diffusion): void { 
        $this->accepte_diffusion = $accepte_diffusion; 
    }
    public function setCertifieInformation(bool $certifie_information): void {
         $this->certifie_information = $certifie_information; 
    }
    public function setCertifieAssoDeclaree(bool $certifie_asso_declaree): void {
         $this->certifie_asso_declaree = $certifie_asso_declaree; 
    }
    public function setCertifieReglementation(bool $certifie_reglementation): void {
         $this->certifie_reglementation = $certifie_reglementation;
     }
    public function setPrecisesVersement(bool $precises_versement): void { 
        $this->precises_versement = $precises_versement; 
    }
    public function setLieuSignature(string $lieu_signature): void {
         $this->lieu_signature = $lieu_signature; 
    }
    public function setDateSignature(string $date_signature): void {
         $this->date_signature = $date_signature; 
    }
    public function setSignature(string $signature): void {
         $this->signature = $signature; 
    }
    public function setIdDossier(int $id_dossier): void {
         $this->id_dossier = $id_dossier; 
    }
    public function setIdPersonne(int $id_personne): void {
         $this->id_personne = $id_personne; 
    }
}
