<?php
class BillController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bill = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'author' => $_SESSION['user']['username'],
                'status' => 'Draft',
                'versions' => [$_POST['initial_draft']]
            ];

            $billRepo = new BillRepository();
            $billRepo->saveBill($bill);

            header('Location: index.php?page=dashboard');
            exit;
        } else {
            require_once 'app/views/create_bill.php';
        }
    }
}
