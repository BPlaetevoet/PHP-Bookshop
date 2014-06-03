<?php
//Film.php
namespace Bookshop\Entities;
/** @Entity@Table(name="films")*/
class Film extends Product {
    /** @Column(type="integer", name="speelduur") */
    private $speelduur;
    /** @ManyToOne(targetEntity="Filmgenre")
     * @JoinColumn(name="filmgenre_id", referencedColumnName="id")*/
     private $filmGenre;
    
   private function __construct($titel, $speelduur, $prijs, $filmGenre){
       $this->titel = $titel;
       $this->speelduur = $speelduur;
       $this->prijs = $prijs;
       $this->filmGenre = $filmGenre;
   }
   public function getSpeelDuur(){
       return $this->speelduur;
   }
   public function getFilmGenre(){
        return $this->filmGenre;
   }
   public function setSpeelDuur($speelduur){ 
       $this->speelduur = $speelduur;
   }
   public function setFilmGenre($filmGenre){
       $this->filmGenre = $filmGenre;
   }
}