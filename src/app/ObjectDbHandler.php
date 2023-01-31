<?php

class ObjectDbHandler {

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function FetchAllObjects(){
        $sql = "
        SELECT * FROM objects
        ";
        $stmt = $this->pdo->query($sql);
        return  $stmt->fetchAll();
    }


    public function CreateObject($address, $zone, $city, $description, $type, $tenure, $rooms, $size, $floor, $totalfloor, $year, $cooperative, $monthly, $price, $img, $img1, $img2, $img3, $img4, $floorplan, $map, $userid){
        $sql = "
        INSERT INTO objects (
            address,    
            zone,       
            city,       
            description,
            type,       
            tenure,     
            rooms,      
            size,       
            floor,      
            totalfloor, 
            year,       
            cooperative,
            monthly,    
            price,      
            img,        
            img1,       
            img2,       
            img3,       
            img4,       
            floorplan,  
            map,
            userid)
        VALUES (
            :address, 
            :zone,     
            :city,     
            :description,
            :type,     
            :tenure,    
            :rooms,    
            :size,     
            :floor,    
            :totalfloor,
            :year,
            :cooperative,
            :monthly, 
            :price,
            :img,
            :img1, 
            :img2,
            :img3,
            :img4,
            :floorplan,
            :map,
            :userid);
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zone', $zone);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':description', $description); 
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':tenure', $tenure);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':floor', $floor);
        $stmt->bindParam(':totalfloor', $totalfloor);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':cooperative', $cooperative);
        $stmt->bindParam(':monthly', $monthly);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':img1', $img1);
        $stmt->bindParam(':img2', $img2);
        $stmt->bindParam(':img3', $img3);
        $stmt->bindParam(':img4', $img4);
        $stmt->bindParam(':floorplan', $floorplan);
        $stmt->bindParam(':map', $map);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
    }


    public function FetchObject(){
        $sql = "
        SELECT * FROM objects
        WHERE objectid = :objectid
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $_GET['objectid']);
        $stmt->execute();
        return  $stmt->fetch();
    }

    public function FetchUserObject(){
        $sql = "
        SELECT * FROM objects
        WHERE userid = :userid
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public function FetchFilteredObject($type, $city, $tenure, $rooms){
        $sql = "
        SELECT * FROM objects
        WHERE type  = :type
        AND city    = :city
        AND tenure  = :tenure
        AND rooms   = :rooms
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':tenure', $tenure);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->execute();
        return  $stmt->fetchAll();
    }

        public function FetchSavedObjects($objectid){
        $sql = "
        SELECT * FROM objects
        WHERE objectid = :objectid

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $_POST['objectid']);
        $stmt->execute();
        return  $stmt->fetchAll();
    }


    public function UpdateObject($address, $zone, $city, $description, $type, $tenure, $rooms, $size, $floor, $totalfloor, $year, $cooperative, $monthly, $price, $img, $img1, $img2, $img3, $img4, $floorplan, $map){
        $sql = "
        UPDATE objects
        SET 
        address       = :address, 
        zone          = :zone, 
        city          = :city, 
        description   = :description, 
        type          = :type,
        tenure        = :tenure,
        rooms         = :rooms,
        size          = :size,
        floor         = :floor,
        totalfloor    = :totalfloor,
        year          = :year,
        cooperative   = :cooperative,
        monthly       = :monthly, 
        price         = :price,
        img           = :img,
        img1          = :img1,
        img2          = :img2,
        img3          = :img3,
        img4          = :img4,
        floorplan     = :floorplan,
        map           = :map
        
        WHERE objectid = :objectid
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $_GET['objectid']);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zone', $zone);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':description', $description); 
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':tenure', $tenure);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':floor', $floor);
        $stmt->bindParam(':totalfloor', $totalfloor);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':cooperative', $cooperative);
        $stmt->bindParam(':monthly', $monthly);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':img1', $img1);
        $stmt->bindParam(':img2', $img2);
        $stmt->bindParam(':img3', $img3);
        $stmt->bindParam(':img4', $img4);
        $stmt->bindParam(':floorplan', $floorplan);
        $stmt->bindParam(':map', $map);
        $stmt->execute();
    }


    public function FetchObjectCart($objectid){
        $sql="
        SELECT * FROM objects
        WHERE objectid = :objectid;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $objectid);
        $stmt->execute();
        return $stmt->fetch();
    }


    // public function FetchProductAPI(){
    //     $sql = "SELECT * FROM products";
    //     $state = $this->pdo->query($sql);
    //     return $state->fetch();
    // }


    public function FetchObjectObjectPage(){
        $sql = "
        SELECT * FROM objects
        WHERE objectid = :objectid
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $_GET['objectid']);
        $stmt->execute();
        return $stmt->fetch();
    }

}

?>