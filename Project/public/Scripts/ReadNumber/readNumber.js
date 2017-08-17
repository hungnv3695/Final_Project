/**
 * Created by SonDC on 8/14/2017.
 */
var mangso = ['không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín'];
function dochangchuc(so,daydu)
{ var chuoi = "";
chuc = Math.floor(so/10);
donvi = so%10;
if (chuc>1) {
    chuoi = " " + mangso[chuc] + " mươi"; if (donvi==1) { chuoi += " mốt"; }
} else if (chuc==1) {
    chuoi = " mười"; if (donvi==1) { chuoi += " một"; }
} else if (daydu && donvi>0) {
    chuoi = " lẻ";
}
if (donvi==5 && chuc>1) {
    chuoi += " lăm";
} else if (donvi>1||(donvi==1&&chuc==0)) {
    chuoi += " " + mangso[ donvi ];
}
    return chuoi;
}
function docblock(so,daydu) {
    var chuoi = "";
    tram = Math.floor(so/100);
    so = so%100;
    if (daydu || tram>0) {
        chuoi = " " + mangso[tram] + " trăm";
        chuoi += dochangchuc(so,true);
    } else {
        chuoi = dochangchuc(so,false);
    }
    return chuoi;
}
function dochangtrieu(so,daydu) {
    var chuoi = ""; trieu = Math.floor(so/1000000);
    so = so%1000000;
    if (trieu>0) {
        chuoi = docblock(trieu,daydu) + " triệu";
        daydu = true;
    }
    nghin = Math.floor(so/1000);
    so = so%1000;
    if (nghin>0) {
        chuoi += docblock(nghin,daydu) + " nghìn";
        daydu = true;
    }
    if (so>0) {
        chuoi += docblock(so,daydu);
    }
    return chuoi;
}

function readNumber(so) {
    if (so.toString() == ''){
        document.getElementById('charMoney').innerHTML = "";
    }
    if (so==0) return mangso[0];
    var chuoi = "", hauto = "";
    do {
        ty = so%1000000000;
        so = Math.floor(so/1000000000);
        if (so>0) {
            chuoi = dochangtrieu(ty,true) + hauto + chuoi;
        } else {
            chuoi = dochangtrieu(ty,false) + hauto + chuoi;
        } hauto = " tỷ";
    } while (so>0);
    var chu = chuoi.substr(1,1).toUpperCase() + chuoi.substr(2,chuoi.length -1) ;
    document.getElementById('charMoney').innerHTML = "( " + chu + " )";
}

function formatCurency(so,flag) {
    var number = so.value;
    while (number.includes('.')){
        number  = number.replace('.','');
    }

    so.value = number.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    if(flag==1){
        readNumber(number);
    }
}

function loadPrice(id,number,flag) {
    id.value = number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    if(flag==1){
        readNumber(number);
    }

}