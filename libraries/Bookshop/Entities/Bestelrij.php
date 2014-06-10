<?php
// Bestelrij.php
namespace Bookshop\Entities;

/**
 * @Entity
 * @Table(name="bestelrijen")
 */
class Bestelrij{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @OneToMany(targetEntity="Bestelling", mappedBy="bestelrij")
     * @JoinColumn(name="bestellingen", referencedColumnName="bestelrijen")
     */
    protected $bestel_id;
    /**
     * 
     * @ManyToOne(targetEntity="Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product_id;
    /**
     * @Column(type="integer", name="aantal")
     */
    protected $aantal;
    /**
     * @Column(type="float", name="b_prijs")
     */
    protected $b_prijs;
    
    public function __construct($bestel_id, $product_id, $aantal, $b_prijs){
        $this->bestel_id =$bestel_id;
        $this->product_id = $product_id;
        $this->aantal = $aantal;
        $this->b_prijs = $b_prijs;
    }
    public function getId(){
        return $this->id;
    }
    public function getBestel_Id(){
        return $this->bestel_id;
    }
    public function getProduct_Id(){
        return $this->product_id;
    }
    public function getAantal(){
        return $this->aantal;
    }
    public function getB_Prijs(){
        return $this->b_prijs;
    }
    public function setBestel_Id($bestel_id){
        $this->bestel_id = $bestel_id;
    }
    public function setProduct_Id($product_id){
        $this->product_id = $product_id;
    }
    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
    public function setB_Prijs($b_prijs){
        $this->b_prijs = $b_prijs;
    }
}
