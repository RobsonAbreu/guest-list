<?php

class guestListService {
    
    public static function guestList() {
        $db = ConnectionFactory::getDB();
        $guests = array();
        
        foreach($db->guests() as $guest) {
           $guests[] = array (
               'id' => $guest['id'],
               'name' => $guest['name'],
               'email' => $guest['email']
           ); 
        }
        return $guests;
    }
    
    public static function getById($id) {
        $db = ConnectionFactory::getDB();
        return $db->guests[$id];
    }
    
    public static function add($newGuest) {
        $db = ConnectionFactory::getDB();
        $guest = $db->guests->insert($newGuest);
        return $guest;
    }
    
    public static function update($updatedGuest) {
        $db = ConnectionFactory::getDB();
        $guest = $db->guests[$updatedlist['id']];
        
        if($guest) {
            $guest['name'] = $updatedGuest['name'];
            $guest['email'] = $updatedGuest['email'];
            $guests->update();
            return true;
        }
        
        return false;
    }
    
}
?>
