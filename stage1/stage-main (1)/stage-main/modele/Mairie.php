<?php
class Mairie {
    private int $id_mairie;
    private string $nom_mairie;
    private string $adresse;
    private string $code_postal;
    private string $ville;
    private string $numero_telephone;
    private string $adresse_email;

    // public function __construct(int $id_mairie = null, string $nom_mairie = null, string $adresse = null, string $code_postal = null,
    //     string $ville = null, string $numero_telephone = null, string $adresse_email = null) {
    //     $this->id_mairie = $id_mairie;
    //     $this->nom_mairie = $nom_mairie;
    //     $this->adresse = $adresse;
    //     $this->code_postal = $code_postal;
    //     $this->ville = $ville;
    //     $this->numero_telephone = $numero_telephone;
    //     $this->adresse_email = $adresse_email;
    // }

    // Getters
    public function getIdMairie(): int {
         return $this->id_mairie; 
        }
    public function getNomMairie(): string {
         return $this->nom_mairie; 
        }
    public function getAdresse(): string {
         return $this->adresse; 
        }
    public function getCodePostal(): string {
         return $this->code_postal; 
        }
    public function getVille(): string {
         return $this->ville; 
        }
    public function getNumeroTelephone(): string {
         return $this->numero_telephone; 
        }
    public function getAdresseEmail(): string {
         return $this->adresse_email; 
        }

    // Setters
    public function setIdMairie(int $id_mairie): void { 
        $this->id_mairie = $id_mairie; 
    }
    public function setNomMairie(string $nom_mairie): void { 
        $this->nom_mairie = $nom_mairie; 
    }
    public function setAdresse(string $adresse): void { 
        $this->adresse = $adresse; 
    }
    public function setCodePostal(string $code_postal): void {
         $this->code_postal = $code_postal; 
    }
    public function setVille(string $ville): void {
         $this->ville = $ville; 
    }
    public function setNumeroTelephone(string $numero_telephone): void { 
        $this->numero_telephone = $numero_telephone; 
    }
    public function setAdresseEmail(string $adresse_email): void {
         $this->adresse_email = $adresse_email; 
    }
}
