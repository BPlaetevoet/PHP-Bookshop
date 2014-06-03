<?php
//Filmgenre.php
namespace Bookshop\Entities;

/** @Entity@Table(name="filmgenres")*/
class FilmGenre{
    /** @id @Column(type="integer", unique=true, nullable=false)
     * @GeneratedValue */
    private $id;
    /** @Column(type="string", length=30, name="omschrijving") */
    private $omschrijving;
    
     private function __construct($omschrijving) {
        $this->omschrijving = $omschrijving;
    }
    public function getgenreId(){
        return $this->id;
    }
    
    public function getOmschrijving(){
        return $this->omschrijving;
    }
    
    public function setOmschrijving($omschrijving){
        $this->omschrijving = $omschrijving;
    }
}