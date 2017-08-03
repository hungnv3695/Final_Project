<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/1/2017
 * Time: 9:51 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    private $id;
    private $paymentTypeId;
    private $reservationId;
    private $accountant_id;
    private $receptionistId;
    private $guestId;
    private $taxCode;
    private $amountTotal;
    private $updateYmd;
    private $createYmd;
    private $createrName;
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
    public function getPaymentTypeId()
    {
        return $this->paymentTypeId;
    }

    /**
     * @param mixed $paymentTypeId
     */
    public function setPaymentTypeId($paymentTypeId)
    {
        $this->paymentTypeId = $paymentTypeId;
    }

    /**
     * @return mixed
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @param mixed $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * @return mixed
     */
    public function getAccountantId()
    {
        return $this->accountant_id;
    }

    /**
     * @param mixed $accountant_id
     */
    public function setAccountantId($accountant_id)
    {
        $this->accountant_id = $accountant_id;
    }

    /**
     * @return mixed
     */
    public function getReceptionistId()
    {
        return $this->receptionistId;
    }

    /**
     * @param mixed $receptionistId
     */
    public function setReceptionistId($receptionistId)
    {
        $this->receptionistId = $receptionistId;
    }

    /**
     * @return mixed
     */
    public function getGuestId()
    {
        return $this->guestId;
    }

    /**
     * @param mixed $guestId
     */
    public function setGuestId($guestId)
    {
        $this->guestId = $guestId;
    }

    /**
     * @return mixed
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * @param mixed $taxCode
     */
    public function setTaxCode($taxCode)
    {
        $this->taxCode = $taxCode;
    }

    /**
     * @return mixed
     */
    public function getAmountTotal()
    {
        return $this->amountTotal;
    }

    /**
     * @param mixed $amountTotal
     */
    public function setAmountTotal($amountTotal)
    {
        $this->amountTotal = $amountTotal;
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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_invoice';

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