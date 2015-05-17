<?php

/**
 * Class RemoveUserPrototype a controller Prototype to remove a certain User by its PK, 
 * therefor it's needed to also use the showRemovedUser Function, which outputs a deleted user as 
 * "deleted user" instead of null
 * 
 * @author Raphael Simsek
 * @version 2015-05-17
 */
class RemoveUserPrototype extends Model{
    
    private $name;
    private $currentUser;

    /**
     * A function used to remove a User off of the platform
     * As for the pages of the User - this will be taken care of with custom 404 pages for User.php
     * @param $name the username of the user, PK of any user
     */
    public function removeUser($name){
        if(isset($name){
            $this->name=$name;
            $this->currentUser=User::destroy($this->name);
        }else{
            $this->name=null;
            throw new BadMethodCallException("$name is not set!");
        }

    }

    /**
     * A function to show whether a user his deleted or a member
     * Function to be used by the views of the book - posts.
     * @param $name the username, which is the PK of a user
     * @return string Returns the Username or "Deleted User"
     */
    public function showRemovedUser($name){
        $this->name=$name;
        $this->currentUser=User::find($this->name);
        if(!isset($this->currentUser)){
            return "Deleted User";
        }else{
            return $this->currentUser.name();
        }
    }
}
?>
