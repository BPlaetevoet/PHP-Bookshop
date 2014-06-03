<?php
//Product.php
namespace Bookshop\Entities;
/** @MappedSuperclass */
class Product{
    // Unieke indentifier voor objecten van deze klasse
    /** @id @Column(type="integer", unique=true, nullable=false)
      * @GeneratedValue */
    protected $id;
    /** @Column(type="string", length=30, name="titel")*/
    protected $titel;
        /** @Column(type="float", name="prijs")*/
    protected $prijs;
    
   
    public function getId(){
        return $this->id;
    }
    public function getTitel(){
        return $this->titel;
    }
    public function getPrijs(){
        return $this->prijs;
    }
    public function setTitel($titel){
        $this->titel = $titel;
    }
    public function setPrijs($prijs){
        $this->prijs = $prijs;
    }
}

