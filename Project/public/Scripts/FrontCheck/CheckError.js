/**
 * Created by SonDC on 7/26/2017.
 */
function InvalidMsg(textbox) {


    if (textbox.value == '') {
        textbox.setCustomValidity('Thông tin bắt buộc');
    }else {
        textbox.setCustomValidity('');
    }

    return true;
}