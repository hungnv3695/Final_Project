<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/5/2017
 * Time: 10:55 AM
 */
namespace App\Http\Common;

class Constants
{
        const MANEGER_SCREENID = '3';
        const  ONE = '1';

        const TIME_FORMAT = "m/d/Y" ;

        // Table name define
        const	TBL_FUNC_ID	=	'func_id';
        const	TBL_SCREEN_NAME	=	'screen_name';
        const	TBL_SCREEN_URL	=	'screen_url';
        const	TBL_LAST_REGISTER_NAME	=	'last_register_name';
        const	TBL_ROLE_SEQ	=	'role_seq';
        const	TBL_SCREEN_ID	=	'screen_id';
        const	TBL_USE_FLG	=	'use_flg';
        const	TBL_GROUP_NAME	=	'group_name';
        const	TBL_USER_NAME	=	'user_name';
        const	TBL_LOGIN_PWD	=	'login_pwd';
        const	TBL_PWD_REGS_YMD	=	'pwd_regs_ymd';
        const	TBL_ACC_LOCK_FLG	=	'acc_lock_flg';
        const	TBL_DELETE_FLG	=	'delete_flg';
        const	TBL_SEQ_NO	=	'seq_no';
        const	TBL_USER_ID	=	'user_id';
        const	TBL_GROUP_CD	=	'group_cd';
        const	TBL_REGISTER_YMD	=	'register_ymd';
        const	TBL_REGISTER_CD	=	'register_cd';
        const	TBL_REGISTER_NM	=	'register_nm';
        const	TBL_LAST_UPDATE_YMD	=	'last_update_ymd';
        const	TBL_LAST_REGISTER_CD	=	'last_register_cd';
        const	TBL_LAST_REGISTER_NM	=	'last_register_nm';
        const   TBL_ROOM_ID = 'room_id';
        const   TBL_ROOM_TYPE_ID = 'room_type_id';
        const   TBL_TYPE_NAME = 'type_name';
        const   TBL_IMAGE_URL = 'image_url';
        const TBL_STATUS_ID = 'status_id';
        const TBL_STATUS_NAME = 'status_name';
        const TBL_DESCRIPTION = 'description';
        const TBL_PRICE = 'price';
        const   TBL_STATUS_TYPE = 'status_type';
        const   TBL_ACCESSORY_NAME = 'accessory_name';
        const   TBL_QUANTITY = 'quantity';
        const   TBL_ADULT = 'adult';
        const  TBL_CHILDREN = 'children';
        const TBL_NOTE = 'note';
        const TBL_PAYMENT_DATE = 'payment_ymd';
        const TBL_PAYMENT_NAME = 'payment_nm';
        const TBL_PAYMENT_STATUS = 'status';
        const NAME_ACC = 'txtNameAcc';
        const QUANTITY_ACC = 'txtquantityAcc';
        const PRICE_ACC = 'txtPriceAcc';

        const TBL_FLOOR = 'floor';
        const TBL_ROOM_NUMBER = 'room_number';

        const  USER_GROUP = "t_user_group";
        const  PERMISSION = " t_permission " ;

        const SUCCESS_MSG = 'SuccessMSG';
        const ERROR_MSG = 'ErrorMSG';


}