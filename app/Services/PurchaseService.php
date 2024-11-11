<?php


namespace App\Services;


use App\Enums\PaymentStatus;
use App\Repositories\ItemRepository;
use App\Repositories\PurchaseRepository;

class PurchaseService
{
    private $purchaseRepository;
    private $itemRepository;
    public function __construct(PurchaseRepository $purchaseRepository, ItemRepository $itemRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
        $this->itemRepository = $itemRepository;
    }

    public function store($data){
        $data['payment_status']=PaymentStatus::PENDING;


        $purchase = $this->purchaseRepository->store($data);

        foreach ($data['items'] as $item_data){
            $item = $this->itemRepository->details($item_data['item_id']);
            if($item){
                $item_data['item_price'] = $item->price;
                $purchase->items()->create($item_data);
            }
        }

        return $purchase;
    }

    public function get(){
        return $this->purchaseRepository->get();
    }

    public function details($id){
        return $this->purchaseRepository->details($id);
    }
}
