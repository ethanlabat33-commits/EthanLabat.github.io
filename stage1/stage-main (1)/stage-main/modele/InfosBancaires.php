<?php

class InfosBancaires {
    private int $id_infos_bancaires;
    private string $nom_titulaire_compte;
    private string $banque;
    private string $domiciliation;
    private string $code_banque;
    private string $code_guichet;
    private string $numero_compte;
    private string $cle_rib;
    private int $id_attestation;

    public function __construct(
        int $id_infos_bancaires, string $nom_titulaire_compte, string $banque,
        string $domiciliation, string $code_banque, string $code_guichet,
        string $numero_compte, string $cle_rib, int $id_attestation
    ) {
        $this->id_infos_bancaires = $id_infos_bancaires;
        $this->nom_titulaire_compte = $nom_titulaire_compte;
        $this->banque = $banque;
        $this->domiciliation = $domiciliation;
        $this->code_banque = $code_banque;
        $this->code_guichet = $code_guichet;
        $this->numero_compte = $numero_compte;
        $this->cle_rib = $cle_rib;
        $this->id_attestation = $id_attestation;
    }

    // Getters
    public function getIdInfosBancaires(): int {
         return $this->id_infos_bancaires; 
    }
    public function getNomTitulaireCompte(): string {
         return $this->nom_titulaire_compte; 
    }
    public function getBanque(): string {
         return $this->banque; 
    }
    public function getDomiciliation(): string {
         return $this->domiciliation; 
    }
    public function getCodeBanque(): string {
         return $this->code_banque; 
    }
    public function getCodeGuichet(): string {
         return $this->code_guichet; 
    }
    public function getNumeroCompte(): string {
         return $this->numero_compte; 
    }
    public function getCleRib(): string {
         return $this->cle_rib; 
    }
    public function getIdAttestation(): int { 
        return $this->id_attestation; 
    }

    // Setters
    public function setNomTitulaireCompte(string $nom_titulaire_compte): void {
         $this->nom_titulaire_compte = $nom_titulaire_compte; 
    }
    public function setBanque(string $banque): void {
         $this->banque = $banque; 
    }
    public function setDomiciliation(string $domiciliation): void {
         $this->domiciliation = $domiciliation; 
    }
    public function setCodeBanque(string $code_banque): void {
         $this->code_banque = $code_banque; 
    }
    public function setCodeGuichet(string $code_guichet): void {
         $this->code_guichet = $code_guichet; 
    }
    public function setNumeroCompte(string $numero_compte): void {
         $this->numero_compte = $numero_compte; 
    }
    public function setCleRib(string $cle_rib): void {
         $this->cle_rib = $cle_rib; 
    }
    public function setIdAttestation(int $id_attestation): void {
         $this->id_attestation = $id_attestation; 
    }
}
