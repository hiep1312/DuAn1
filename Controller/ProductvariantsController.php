<?php
require_once '../Model/Productvariants.php';
class ProductvariantsController {
    protected $execute;
    public function __construct(){
        $this->execute = new Productvariants('productvariants');
    }
    public function getAll(){
        return $this->execute->getAllData();
    }
    public function getOne($id){
        return $this->execute->getDataById($id);
    }
    public function create($dataRequest){
        $dataRequest['product_id'] = isset($dataRequest['product_id']) ? $dataRequest['product_id']: null;
        $dataRequest['material'] = isset($dataRequest['material']) ? $dataRequest['material']: null;
        $dataRequest['color'] = isset($dataRequest['color']) ? $dataRequest['color']: null;
        $dataRequest['price'] = isset($dataRequest['price']) ? $dataRequest['price']: null;
        $dataRequest['price_reduced'] = isset($dataRequest['price_reduced']) ? $dataRequest['price_reduced']: null;
        $dataRequest['stock_quantity'] = isset($dataRequest['stock_quantity']) ? $dataRequest['stock_quantity']: null;
        $dataRequest['start_at'] = isset($dataRequest['start_at']) ? $dataRequest['start_at']: null;
        $dataRequest['end_at'] = isset($dataRequest['end_at']) ? $dataRequest['end_at']: null;
        $dataRequest['status'] = isset($dataRequest['status']) ? $dataRequest['status']: null;
        return $this->execute->addData($dataRequest);
    }
    public function update($id, $dataRequest){
        $dataOld = $this->execute->getDataById($id);
        if(!$dataOld):return false;
        endif;
        settype($dataOld, 'array');
        $dataRequest['product_id'] = isset($dataRequest['product_id']) ? $dataRequest['product_id']: null;
        $dataRequest['material'] = isset($dataRequest['material']) ? $dataRequest['material']: null;
        $dataRequest['color'] = isset($dataRequest['color']) ? $dataRequest['color']: null;
        $dataRequest['price'] = isset($dataRequest['price']) ? $dataRequest['price']: null;
        $dataRequest['price_reduced'] = isset($dataRequest['price_reduced']) ? $dataRequest['price_reduced']: null;
        $dataRequest['stock_quantity'] = isset($dataRequest['stock_quantity']) ? $dataRequest['stock_quantity']: null;
        $dataRequest['start_at'] = isset($dataRequest['start_at']) ? $dataRequest['start_at']: null;
        $dataRequest['end_at'] = isset($dataRequest['end_at']) ? $dataRequest['end_at']: null;
        $dataRequest['status'] = isset($dataRequest['status']) ? $dataRequest['status']: null;
        return !$this->execute->updateData($id, $dataRequest)?false:$dataOld;
    }
    public function delete($id){
        $checkid = $this->execute->getDataById($id);
        if(!$checkid):return false;
        endif;
        settype($checkid, 'array');
        return !$this->execute->deleteDataById($id)?false:$checkid;
    }
}