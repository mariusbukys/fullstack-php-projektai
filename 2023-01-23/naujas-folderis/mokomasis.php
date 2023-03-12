<?php


echo $_POST['name'];
echo $_POST['age'];


?>

    <!-- <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Click</a> -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST">
   <div>
    <label for="name">Name:</label>
    <input type="text" name="name">
   </div>
   <div>
    <label for="age">Age:</label>
    <input type="text" name="age">
   </div>
   <input type="submit" name="submit" value="submit">
    </form>


<?php

class Book{
  public $title;
  public $author;
  public $price;
  public $weight;
  public $file;

  public function __construct(string $title, string $author, int $price, int $weight=0, int $file=0){
    $this->title=$title;
    $this->author=$author;
    $this->price=$price;
    $this->weight=$weight;
    $this->file=$file;
  }
  public function getTitle(): string{
    return $this->title;
  }
  public function getAuthor(): string{
    return $this->author;
  } 
  public function getPrice(): int{
    return $this->price;
  }
  public function getWeight(): int{
    return $this->weight;
  }
  public function getFile(): int{
    return $this->file;
  }
}
$physicalBook = new Book('Drugelis','Jo Nesbo',25);
$physicalBook1 = new Book('Drugelis','Jo Nesbo',25);
$digitalBook = new Book('Moriartis','Elon Musk', 43);

print_r($physicalBook->title);
print_r($physicalBook1->title='Draugas');
