<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/1/2017
 * Time: 9:54 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    private $id;
    private $roomNumber;
    private $invoiceId;
    private $desc;
    private $quantity;
    private $price;
    private $amount_total;
    private $updateYmd;
    private $createYmd;

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * @param mixed $roomNumber
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
    }

    /**
     * @return mixed
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param mixed $invoiceId
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }


    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAmountTotal()
    {
        return $this->amount_total;
    }

    /**
     * @param mixed $amount_total
     */
    public function setAmountTotal($amount_total)
    {
        $this->amount_total = $amount_total;
    }

    /**
     * @return mixed
     */
    public function getUpdateYmd()
    {
        return $this->updateYmd;
    }

    /**
     * @param mixed $updateYmd
     */
    public function setUpdateYmd($updateYmd)
    {
        $this->updateYmd = $updateYmd;
    }

    /**
     * @return mixed
     */
    public function getCreateYmd()
    {
        return $this->createYmd;
    }

    /**
     * @param mixed $createYmd
     */
    public function setCreateYmd($createYmd)
    {
        $this->createYmd = $createYmd;
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_invoice_detail';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * setting use increment number or not
     * @var bool
     */
    public $incrementing = true;

    /**
     * setting use timestamps or not
     * @var bool
     */
    public $timestamps = false;
}