<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table            = 'transaction_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false; // Set ke false jika tabel ini tidak pakai deleted_at
    protected $protectFields    = true;
    protected $allowedFields    = ['transaction_id', 'product_id', 'jumlah']; // Sesuaikan dengan field di DB kamu

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false; // Set ke false jika tidak pakai created_at/updated_at
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // --- Fungsi Utama dari Modul Kuliah/Notion Kamu ---
    public function getProductsByTransactionIds(array $transactionIds)
    {
        if (empty($transactionIds)) {
            return [];
        }

        $details = $this->select('transaction_detail.*, product.nama, product.harga, product.foto')
            ->join('product', 'transaction_detail.product_id = product.id')
            ->whereIn('transaction_id', $transactionIds)
            ->findAll();

        $products = [];

        foreach ($details as $detail) {
            $products[$detail['transaction_id']][] = $detail;
        }

        return $products;
    }
}