/**
 * Created by SonDC on 7/14/2017.
 */

function addAccessory() {

    var table =document.getElementById('table');

    // deep clone the targeted row
    var new_row = table.rows[1].cloneNode(true);

    // get the total number of rows
    var len = table.rows.length;

    // set the innerHTML of the first row
    new_row.cells[0].innerHTML = len;

    // grab the input from the first cell and update its ID and value
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.name += len-1;
    inp1.value = '';

    // grab the input from the first cell and update its ID and value
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.name += len-1;
    inp2.value = '0';

    // grab the input from the first cell and update its ID and value
    var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.name += len-1;
    inp3.id += len;
    inp3.value = '1';

    var tbody = table.getElementsByTagName('tbody')[0];

    // append the new row to the table
    tbody.appendChild( new_row );


}

function deleteAccessory() {
    var table =  document.getElementById("table");
    if (table.rows.length >2 ){
        table.deleteRow(-1);
    }
}

var btnAddRoomType =  document.getElementById("bntAddType");
btnAddRoomType.onclick =  function () {
    var table =document.getElementById('table');
    document.getElementById('count').value = table.rows.length - 1;
}




