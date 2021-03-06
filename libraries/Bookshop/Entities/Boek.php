<?php
//Boek.php
namespace Bookshop\Entities;


/**
* @Entity
* @Table(name="boeken")
*/
class Boek extends Product{
    
    /**
     * @Column(type="string", length=32)
     * 
     */
    protected $auteur;


    
    public function __construct($titel, $prijs, $auteur, $genre){
        $this->titel = $titel;
        $this->prijs = $prijs;
        $this->auteur = $auteur;
        $this->genre = $genre;
    }

    public function getAuteur(){
        return $this->auteur ;
    }
    public function getGenre(){
        return $this->genre;
    }
    
    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }
    public function setGenre($genre) {
        $this->genre = $genre;
    }

}
