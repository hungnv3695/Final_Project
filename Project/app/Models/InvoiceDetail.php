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
    private $invoiceId;
    private $item_id;
    private $item_type;
    private $quantity;
    private $price;
    private $description;
    private $amount_total;
    private $roomId;
    private $createrName;
    private $updaterName;
    private $updateYmd;
    private $createYmd;
    private $paymentFlag;

    /**
     * @return mixed
     */
    public function getPaymentFlag()
    {
        return $this->paymentFlag;
    }

    /**
     * @param mixed $paymentFlag
     */
    public function setPaymentFlag($paymentFlag)
    {
        $this->paymentFlag = $paymentFlag;
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
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * @param mixed $item_id
     */
    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @return mixed
     */
    public function getItemType()
    {
        return $this->item_type;
    }

    /**
     * @param mixed $item_type
     */
    public function setItemType($item_type)
    {
        $this->item_type = $item_type;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param mixed $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return mixed
     */
    public function getCreaterName()
    {
        return $this->createrName;
    }

    /**
     * @param mixed $createrName
     */
    public function setCreaterName($createrName)
    {
        $this->createrName = $createrName;
    }

    /**
     * @return mixed
     */
    public function getUpdaterName()
    {
        return $this->updaterName;
    }

    /**
     * @param mixed $updaterName
     */
    public function setUpdaterName($updaterName)
    {
        $this->updaterName = $updaterName;
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