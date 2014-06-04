<?php
//Product.php
namespace Bookshop\Entities;


/**
* @Entity
* @Table(name="products")
* @InheritanceType("JOINED")
* @DiscriminatorColumn(name="Product", type="string", length=20)
* @DiscriminatorMap({"boek" = "Boek", "film" = "Film"})
*/
abstract class Product{
    // Unieke indentifier voor objecten van deze klasse
    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO") 
     */
    protected $id;
    /** 
     * @Column(type="string", length=30, name="titel")
     */
    protected $titel;
    /** 
     * @Column(type="float", name="prijs")
     */
    protected $prijs;
    /** 
     * @ManyToOne(targetEntity="Genre")
     * @JoinColumn(name="genre_id", referencedColumnName="id")
     */
    protected $genre;
       
   
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

