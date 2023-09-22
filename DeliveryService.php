<?php

abstract class DeliveryService {
    protected $base_url;
    
    public function __construct($base_url) {
        $this->base_url = $base_url;
    }
    
    abstract public function calculateCostAndDate($sourceKladr, $targetKladr, $weight);
}

?>
