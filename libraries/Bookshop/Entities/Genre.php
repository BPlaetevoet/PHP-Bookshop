<?php
//Genre.php
namespace Bookshop\Entities;
/** @Entity @Table(name="genres")*/
class Genre{
     /** @id @Column(type="integer", unique=true, nullable=false)
     * @GeneratedValue */
    private $id;
    /** @Column(type="string", length=30) */
    private $omschrijving;
    
    private function __construct($omschrijving) {
        $this->omschrijving = $omschrijving;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getOmschrijving(){
        return $this->omschrijving;
    }
    
    public function setOmschrijving($omschrijving){
        $this->omschrijving = $omschrijving;
    }
}
