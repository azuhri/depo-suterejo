<?php


namespace App\Http\Services;

use App\Http\Repositories\TransactionRepository;
use Exception;

class TransactionService 
{
    public TransactionRepository $transRepo;
    public function __construct(
        TransactionRepository $repo
    )
    {
        $this->transRepo = $repo;
    }

    public function newTransaction($request) {
        return $this->transRepo->createNewTransaction($request);
    }
}
