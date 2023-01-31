<?php

class InquiryDbHandler {
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function fetchAllRequests() {
        $sql = "SELECT * FROM requests;";
        $state = $this->pdo->query($sql);
        return $state->fetchAll();
    }


    public function insertIntoRequest($userId, $cartTotalSum, $firstName, $lastName, $street, $postalCode, $city, $country) {
        $sql = "
        INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
        VALUES (:user_id, :total_price, :billing_full_name, :billing_street, :billing_postal_code, :billing_city, :billing_country)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':total_price', $cartTotalSum);
        $stmt->bindValue(':billing_full_name', $firstName . " " . $lastName);
        $stmt->bindValue(':billing_street', $street);
        $stmt->bindValue(':billing_postal_code', $postalCode);
        $stmt->bindValue(':billing_city', $city);
        $stmt->bindValue(':billing_country', $country);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function deleteOrder() {
        $sql = "
        DELETE FROM orders 
        WHERE id = :id;
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':id', $_POST['orderId']);
        return $state->execute();
    }


    public function createOrder($orderId,$item){
        $sql = "
        INSERT INTO order_items (order_id, product_id, product_title, quantity, unit_price)
        VALUES (:order_id, :product_id, :product_title, :quantity, :unit_price)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':order_id', $orderId);
        $stmt->bindValue(':product_id', $item['id']);
        $stmt->bindValue(':product_title', $item['title']);
        $stmt->bindValue(':quantity', $item['quantity']);
        $stmt->bindValue(':unit_price', $item['price']);
        return $stmt->execute();
    }

    public function createInquiry($objectid, $sender, $receiver, $mail){
        $sql = "
        INSERT INTO inquirys (objectid, sender, receiver, mail)
        VALUES (:objectid, :sender, :receiver, :mail)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':objectid', $objectid);
        $stmt->bindValue(':sender', $sender);
        $stmt->bindValue(':receiver', $receiver);
        $stmt->bindValue(':mail', $mail);
        return $stmt->execute();
    }

    public function FetchSaved($userid){
        $sql = "
        SELECT * FROM saved
        WHERE userid = :userid

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    
    public function CheckFetchSaved($userid){
        $sql = "
        SELECT * FROM saved
        WHERE userid = :userid

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
        return  $stmt->rowCount();
    }
    
    public function CheckSavedObject($objectid,$userid){
        $sql = "
        SELECT * FROM saved
        WHERE objectid = :objectid
        AND userid = :userid

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $objectid);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
        return  $stmt->rowCount();
    }


    public function RemoveSavedObject($objectid, $userid){
        $sql = "
        DELETE FROM saved
        WHERE objectid = :objectid
        AND userid = :userid

        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':objectid', $objectid);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->execute();
    }
    
    
    public function CreateSavedObject($objectid, $userid){
        $sql = "
        INSERT INTO saved (objectid, userid)
        VALUES (:objectid, :userid)

        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':objectid', $objectid);
        $stmt->bindParam(':userid', $_SESSION['userid']);
        $stmt->execute();
    }
    
    
}

?>