/**
 * Created by SonDC on 7/26/2017.
 */
function InvalidMsg(textbox) {
    var flag = 0;

    if (textbox.value == '') {
        textbox.setCustomValidity('Thông tin bắt buộc.');
        flag = 1;
    } else {
        textbox.setCustomValidity('');
    }

    if (textbox.type == "number"){
        if (parseInt(textbox.value) != textbox.value){
            textbox.setCustomValidity('Xin hãy nhập một số nguyên >=' + textbox.min);
            flag = 1;
        } else if(textbox.value < textbox.min){
            textbox.setCustomValidity('Xin hãy nhập số nguyên >=' + textbox.min);
            flag = 1;
        } else{
            textbox.setCustomValidity('');
        }

    }

    if(textbox.type == 'email'){
        if(textbox.validity.typeMismatch){
            textbox.setCustomValidity('Nhập đúng định dạng email');
            flag = 1;
        }else{
            textbox.setCustomValidity('');
        }
    }

        return true;
}