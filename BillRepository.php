<?php
class BillRepository {
    private $filePath;

    public function __construct() {
        $this->filePath = STORAGE_PATH . 'bills.json';
    }

    public function getAllBills() {
        return json_decode(file_get_contents($this->filePath), true) ?? [];
    }

    public function saveBill($bill) {
        $bills = $this->getAllBills();
        $bills[] = $bill;
        file_put_contents($this->filePath, json_encode($bills));
    }
}
