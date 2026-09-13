<?php 
class product {

    protected string $title;
    protected float $price;

    private string $sku;

    public static int $totalProducts = 0;

    public function __construct( string $title, float $price, string $sku){
 
    $this->title = $title;
    $this->price = $price; 
    $this->sku = $sku;
    self :: $totalProducts++;
    }

    public function __destruct() {
         echo "Product '{$this->title}' removed from memory.<br>"; }

    public function get_Details() {

        echo "Product :".$this->title . "Price :".$this->price ;
    }
  final public function getSKU(): string {
        return $this->sku;
    }

}

class DigitalProduct extends Product { 

    private float $downloadSizeMB; 

    public function __construct($title, $price, $sku, $downloadSizeMB) { 

    parent::__construct($title, $price, $sku);
     $this->downloadSizeMB = $downloadSizeMB; 

     } 
     
     public function get_Details() { 
       echo parent::get_Details() . ", Download Size: $this->downloadSizeMB MB";
       
       }

}

$product1 = new product( "Laptop", 1200.00, "LAP-001" );
echo $product1->get_Details() . "<br>"; 

$product2 = new product( "Book", 1500, "book-12" );
echo $product2->get_Details() . "<br>"; 

echo "Total Products Instantiated: " . Product::$totalProducts . "<br>"; 

?>
