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

     public function get_Details() : string {

         return "Product: {$this->title}, Price: $" . number_format($this->price, 2);
    }

    final public function getSKU(): string { 
      return $this->sku; } 

}

class DigitalProduct extends Product { 

   private float $downloadSizeMB; 
   
   public function __construct( string $title, float $price, string $sku, float $downloadSizeMB )
    {  
      parent::__construct($title, $price, $sku); 
      $this->downloadSizeMB = $downloadSizeMB; 
    }
   public function getDetails(): string { 
      $details = parent::getDetails(); 
      return $details . ", Download Size: {$this->downloadSizeMB} MB"; 
     }

   public function getSKU(): string { 
      return "Digital-" . parent::getSKU(); }
}

$product1 = new Product( "Laptop", 1200.00, "LAP-001" );
echo $product1->getDetails() . "<br>"; 
echo "SKU: " . $product1->getSKU() . "<br><br>";

$product2 = new DigitalProduct( "PHP Programming Course", 49.99, "PHP-COURSE-001", 850.5 );
echo $product2->getDetails() . "<br>"; 
echo "SKU: " . $product2->getSKU() . "<br><br>";

?>
