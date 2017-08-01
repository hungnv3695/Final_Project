<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/1/2017
 * Time: 9:51 AM
 */

namespace App\Models;


class Invoice
{
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