<?php
//User.php
namespace Bookshop\Entities;

/** 
 * @Entity
 * @Table(name="users")
 */
class User {
    /** 
     * @id 
     * @Column(type="integer", unique=true, nullable=false)
     * @GeneratedValue(strategy="AUTO") 
     */
    private $id;
    /** 
     * @Column(type="string", length=32, name="naam")
     */
    private $naam;
    /** 
     * @Column(type="string", length=32, name="voornaam")
     */
    private $voornaam;
    /** 
     * @Column(type="string", length=32, name="email")
     */
    private $mail;
    /** 
     * @Column(type="string", length=52, name="adres")
     */
    private $adres;
    /** 
     * @Column(type="string", length=32, name="password")
     */
    private $password;
    /** 
     * @Column(type="boolean", length=1, name="isadmin")
     */
    private $isadmin;
     /** 
      * @ManyToOne(targetEntity="Plaats")
      * @ORM\JoinColumn(name="plaats_id", referencedColumnName="id")
      */           
    private $plaats;
    
    
    
    public function __construct($id, $naam, $voornaam, $mail, $adres, $password, $isadmin, $plaats){
        $this->id = $id;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->mail = $mail;
        $this->adres = $adres;
        $this->password = $password;
        $this->isadmin = $isadmin;
        $this->plaats = $plaats;
        
    }

    public function getId(){
        return $this->id;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getVoornaam(){
        return $this->voornaam;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getAdres(){
        return $this->adres;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getAdmin(){
        return $this->isadmin;
    }
    public function getPlaats(){
        return $this->plaats;
    }
    
    public function setNaam($naam){
        $this->naam = $naam;
    }
    public function setVoornaam($voornaam){
        $this->voornaam = $voornaam;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setAdres($adres){
        $this->adres = $adres;
    }
    public function setPlaats($plaats){
        $this->plaats = $plaats;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setAdmin($isadmin){
        $this->isadmin = $isadmin;
    }
}