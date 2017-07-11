<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/11/2017
 * Time: 10:00 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_status';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'status_id';

    /**
     * setting use increment number or not
     * @var bool
     */
    public $incrementing = false;

    /**
     * setting use timestamps or not
     * @var bool
     */
    public $timestamps = false;
}