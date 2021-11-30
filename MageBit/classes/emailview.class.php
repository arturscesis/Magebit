<?php
//Class that shows results to user
class emailview extends email{

    public function showEmails($email){
        $results = $this->getEmails($email);
        return $results;
    }

    public function getOrder($post){
        $results = $this->getEmailOrder($post);
        return $results;
    }
}