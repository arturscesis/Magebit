<?php
//Handles interactions with database
class emailcontr extends email{

    public function createEmail($email){
        $this->setEmail($email);
    }

    public function delEmail($deleteId){
        $this->deleteEmail($deleteId);
    }
}