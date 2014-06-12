<?php
//Order.php

namespace Bookshop\Entities;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="orders")
 */
class Order{
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
     * @Column(type="float", name="bedrag", nullable=true)
     */
    protected $bedrag;
    /**
     * @Column(type="datetime", name="b_datum")
     */
    protected $b_datum;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="OrderItem", mappedBy="order", cascade={"ALL"})
     */
    protected $items;
    
    public function __construct($user_id){
        $this->user_id = $user_id;
        $this->b_datum = new \DateTime("now");
        $this->items = new ArrayCollection();
    }
    public function getId(){
        return $this->id;
    }
    public function getUser_Id(){
        return $this->userid;
    }
    public function getBedrag(){
        return $this->bedrag;
    }
    public function getB_Datum(){
        return $this->b_datum;
    }
    public function addItem(orderitem $item){
        $this->items[] = $item;
    }
    public function getitem($item){
        return $this->items[$item];
    }
    public function getItems(){
        return $this->items->toArray();
    }
    public function setUser_Id($user_id){
        $this->user_id = $user_id;
    }
    public function setBedrag($bedrag){
        $this->bedrag = $bedrag;
    }
    public function setB_Datum($b_datum){
        $this->b_datum = $b_datum;
    }
    public function setItems($items){
        $this->items = new ArrayCollection();
    }

}
