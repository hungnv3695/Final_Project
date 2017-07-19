<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/18/2017
 * Time: 10:17 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_reservation_detail';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = array('reservation_id', 'room_id');

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