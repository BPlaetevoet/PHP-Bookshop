<?php
//Plaats.php
namespace Bookshop\Entities;
/** @Entity@Table(name="plaatsen")*/
class Plaats{
    private static $idMap;
    /** @id @Column(type="integer", unique=true, nullable=false)
     * @GeneratedValue */
    private $id;
    /** @Column(type="integer", length=4,name="postcode")*/
    private $postcode;
    /** @Column(type="string", length=32, name="gemeente")*/
    private $gemeente;
    
    private function __construct($id, $postcode, $gemeente){
        $this->id = $id;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }
    public static function __create($id, $postcode, $gemeente){
        if(!isset(self::$idMap[$id])){
            self::$idMap[$id] = new Plaats($id, $postcode, $gemeente);
        }
        return self::$idMap[$id];        
    }
    public function getId(){
        return $this->id;
    }
    public function getPostcode(){
        return $this->postcode;
    }
    public function getGemeente(){
        return $this->gemeente;
    }
    public function setPostcode($postcode){
        $this->postcode = $postcode;
    }
    public function setGemeente($gemeente){
        $this->gemeente = $gemeente;
    }
}

