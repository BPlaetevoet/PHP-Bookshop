<?php
/* CartItem.php
 * 
 */
namespace Bookshop\Entities;

/**
 * @Entity
 * @Table(name="orderitems")
 */
class OrderItem{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ManyToOne(targetEntity="Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $productId;
    /**
     * @ManyToOne(targetEntity="Order", inversedBy="items")
     * @JoinColumn(name="order_id", nullable=false, onDelete="CASCADE", referencedColumnName="id")
     */
    protected $order;

    /**
     * @Column(type="integer", name="aantal")
     */
    protected $aantal;
    /**
     * @Column(type="float", name="b_prijs")
     */
    protected $b_prijs;
    
    public function __construct($productId, $aantal, $b_prijs , $order){
        $this->productId = $productId;
        $this->aantal = $aantal;
        $this->b_prijs = $b_prijs;
        $this->order = $order;
    }
    public function getId(){
        return $this->id;
    }
    public function getProductId(){
        return $this->productId;
    }
    public function getAantal(){
        return $this->aantal;
    }
    public function getB_Prijs(){
        return $this->b_prijs;
    }
    public function getOrder(){
        return $this->order;
    }
    public function setProduct_Id($productId){
        $this->productId = $productId;
    }
    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
    public function setB_Prijs($b_prijs){
        $this->b_prijs = $b_prijs;
    }
   
}

