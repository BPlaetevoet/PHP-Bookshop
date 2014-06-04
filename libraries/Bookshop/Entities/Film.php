<?php
//Film.php
namespace Bookshop\Entities;

/**
* @Entity
* @Table(name="films")
*/
class Film extends Product {
   /** 
      * @id 
      * @Column(type="integer", unique=true, nullable=false)
      * @GeneratedValue(strategy="AUTO")
      */
    protected $id;
    
    /** 
     * @Column(type="integer", name="speelduur") 
     */
    private $speelduur;
    /** 
     * @ManyToOne(targetEntity="Genre")
     * @JoinColumn(name="filmgenre_id", referencedColumnName="id")
     */
     protected $genre;
    
   public function __construct($titel, $prijs, $speelduur, $genre){
       $this->titel = $titel;
       $this->speelduur = $speelduur;
       $this->prijs = $prijs;
       $this->genre = $filmGenre;
   }
   public function getSpeelDuur(){
       return $this->speelduur;
   }
   public function getGenre(){
        return $this->genre;
   }
   public function setSpeelDuur($speelduur){ 
       $this->speelduur = $speelduur;
   }
   public function setFilmGenre($filmGenre){
       $this->filmGenre = $filmGenre;
   }
}