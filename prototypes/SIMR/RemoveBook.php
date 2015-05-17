<?php
class RemoveBooksPrototype extends Model{
  private $ISBN;
  private $currentbook;
  /**
   * @param $ISBN the ISBN with shall be (Soft)Deleted
   */
  public function removeBook($ISBN){
    $this->ISBN=$ISBN;
    $this->currentbook=Book::find($this->ISBN); //Searches for book by ISBN
    $this->currentbook->softDeletes(); //SoftDeletes the book by ISBN
  }
}
?>
