<?php
//Bestelling.php
namespace Bookshop\Entities;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="bestellingen")
 * 
 */

class Bestelling{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;
    
    /**
     * @Column(type="float", name="bedrag")
     */
    protected $bedrag;
    
    /**
     * @Column(type="datetime", name="b_datum")
     */
    protected $b_datum;
    /**
     * BiDirectional
     * @ManyToOne(targetEntity="Bestelrij", inversedBy="bestel_id")
     * @JoinTable(name="bestelrijen")
     */
    protected $bestelrij = array();
 
    public function __construct($user_id, $bedrag){
        $this->user_id = $user_id;
        $this->bedrag = $bedrag;
        $this->bestelrij = new ArrayCollection();
        $this->b_datum = new \DateTime("now");
    }
    public function getUser_Id(){
        return $this->user_id;
    }
    public function getBedrag(){
        return $this->bedrag;
    }
    public function getB_Datum(){
        return $this->b_datum;
    }
    public function setUser_Id($user_id){
        $this->user_id = $user_id;
    }
    public function setBedrag($bedrag){
        $this->bedrag = $bedrag;
    }
    public function setB_Datum(){
        $this->b_datum = new \DateTime("now");
    }
}