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
    protected $id;
    /** 
     * @Column(type="string", length=32, name="naam")
     */
    protected $naam;
    /** 
     * @Column(type="string", length=32, name="voornaam")
     */
    protected $voornaam;
    /** 
     * @Column(type="string", length=32, name="email")
     */
    protected $mail;
    /** 
     * @Column(type="string", length=52, name="adres")
     */
    protected $adres;
    /** 
     * @Column(type="string", length=32, name="password")
     */
    protected $password;
    /** 
     * @Column(type="boolean", length=1, name="isadmin")
     */
    protected $isadmin;
     /** 
      * @ManyToOne(targetEntity="Plaats")
      * @ORM\JoinColumn(name="plaats_id", referencedColumnName="id")
      */           
    protected $plaats;
    
    public function __construct($plaats, $naam, $voornaam, $mail, $adres, $password ){
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->mail = $mail;
        $this->adres = $adres;
        $this->password = $password;
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