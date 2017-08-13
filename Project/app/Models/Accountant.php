<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/12/2017
 * Time: 3:32 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{

    private $name;
    private $date;
    private $total;
    private $receiveTotal;

    /**
     * @return mixed
     */
    public function getReceiveTotal()
    {
        return $this->receiveTotal;
    }

    /**
     * @param mixed $receiveTotal
     */
    public function setReceiveTotal($receiveTotal)
    {
        $this->receiveTotal = $receiveTotal;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_accountant';

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