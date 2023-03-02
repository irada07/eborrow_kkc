
@extends('layouts.home.app')

@section('title', 'Main page')

@section('content')
    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color:#f5f5f5;}

    .my-swal {
        z-index: 99999!impotant;
    }
    </style>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="pull-right">


                        <button type="button" class="btn btn-primary" id="cartBtn" >รายการ (<span class="total-count"></span>)</button>
                        <button class="clear-cart btn btn-danger"><i class="ri-delete-bin-6-fill"></i></button>

                        {{-- <button type="button" id="modal2Btn" class="btn btn-primary">
                            <i class="fa fa-plus"></i> สร้างรายการเบิกวัสดุ
                        </button> --}}
                    </div>
                    <h3>รายการครุภัณฑ์</h3>
                </div>

                <div class="ibox-content">
                      <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="good_list_table" style="width:100%" >
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อครุภัณฑ์</th>
                                <th>กลุ่ม</th>
                                <th>จำนวนคงเหลือ</th>
                                <th>หน่วยนับ</th>
                                <th>สถานที่จัดเก็บ</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                      </div>
                </div>

            </div>
        </div>
    </div>


     <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLabel">รายการเบิกครุภัณฑ์</h5>

        </div>
        <div class="modal-body">
            {{-- <form action=""> --}}

                    <table id="table1"  style="width:100%" class="text-center">

                    </table>
                {{-- <div class="row text-center">
                    <div class="col-md-6" id="test1">

                    </div>
                    <div class="col-md-6" id="test2">

                    </div>
                </div> --}}

            {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          <button type="button" id="order" class="btn btn-primary">ยืนยันรายการ</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}

<script>
var count = 0;
var array_items = [];
var array_amounts = [];

$( "#Adhome" ).click(function() {
    console.log("ex_count"+ex_count);
});

$( "#cartBtn" ).click(function() {
    blah();
    console.log(array_items);
    console.log(array_amounts);
    $('#cart').modal('show');
    var no = 1;
    count = 0;

    var table = document.getElementById("table1");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = "no";
    cell2.innerHTML = "รายการ";
    cell3.innerHTML = "จำนวน";
    cell4.innerHTML = "หน่วยนับ";
    cell5.innerHTML = "";

    var index = '';
    array_items.forEach(function(o) {
        row = table.insertRow(-1);
        cell1 = row.insertCell(0);
        cell2 = row.insertCell(1);
        cell3 = row.insertCell(2);
        cell4 = row.insertCell(3);
        cell5 = row.insertCell(4);
        cell1.innerHTML = no;
        cell2.innerHTML = o.name;
        cell3.innerHTML = array_amounts[count];
        cell4.innerHTML = o.unit.name;

        cell5.innerHTML = `<button class="btn btn-danger btm-sm" onclick="deleteItem(${count})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>`

        count++;
        no++;
    });
    console.log('ok');
});

$( "#order" ).click(function() {
    if(array_items.length > 0 && array_amounts.length > 0){
        $.post(path + "/goods/order", data = {
            _token: '{{ csrf_token() }}',
            array_items: array_items,
            array_amounts: array_amounts,
         },
            function (res) {
                $('#cart').modal('hide');
                Swal.fire(res.title, res.msg, res.status);
                good_list_table.ajax.reload();
                clearCart();
                sessionStorage.setItem("count", 0);
            },
        );
    }
});

function blah() {
        document.getElementById("table1").innerHTML = "";
        // document.getElementById("test2").innerHTML = "";
 }

 function deleteItem(index) {
     var id = array_items[index].id;
    //  console.log(id);
    $('#m'+id).text('');
    array_items.splice(index,1);
    array_amounts.splice(index,1);
    showCount(array_items.length);
    document.getElementById("table1").deleteRow(index+1);
 }

$( document ).ready(function() {
    sessionStorage.setItem("count", 0);
    $('.total-count').text(count);
});

var input = 1;
function checkItem(obj) {
    console.log(array_items)
    console.log(array_amounts)
    if(array_items.length > 0){
        for(let i = 0; i < array_items.length; i++){
        if(obj['id'] == array_items[i]['id']){
            input = array_amounts[i]
            i = array_items.length
        }else{
            input = 1
        }
    }
    }else{
        input = 1
    }
}

async function addToList(item){
    console.log(item)
    await Swal.fire({
        title: 'กรุณากรอกจำนวน',
        input: 'number',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: '#1ab394',
        cancelButtonColor: '#FF0000',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง',
        inputValue: input,
        inputAttributes: {
        min: 1,
        },
        inputValidator: (value) => {
            if (!value || value == 0) {
                return 'กรุณากรอกจำนวน!';
            }else if(value < 1){
                return 'จำนวนต้องมากกว่า 1';
            }else if(value % 1 != 0 ){
                return 'กรอกเป็นจำนวนเต็มเท่านั้น';
            }else if(value > (item.amount - item.defective) ){
                return 'ครุภัณฑ์ไม่เพียงพอ!';
            }else{

                var found = findObjectByKey(array_items, 'id', item.id);
                // console.log(found);
                if(found == 'f'){
                    array_items.push(item);
                    array_amounts.push(value);
                    showCount(array_items.length);
                    // console.log(array_items);
                    sessionStorage.setItem("count", array_items.length);
                    console.log('case : false');
                }else{
                    console.log('case : true');
                    array_amounts[found] = value;
                    // console.log(array_amounts);
                }
                var id = item.id.toString();
                $('#m'+id).text(value);

            }
        }
    });
}

function showCount(count){
    $('.total-count').text(count);
}

function clearCart(){
     $('.btn-sm').attr("disabled", false);
    array_items = [];
    array_amounts = [];
    input = 1
    console.log(array_items);
    $('.total-count').text(array_items.length);
}

$('.clear-cart').click(function () {
    // count = 0;
    sessionStorage.setItem("count", 0);
    swal.fire('ลบรายการทั้งหมดแล้ว!!', '', 'success')
    $('.btn-sm').attr("disabled", false);
    array_items = [];
    array_amounts = [];
    // console.log(array_items);
    $('.total-count').text(array_items.length);
    $('.badge-light').text('')
});

function findObjectByKey(array, key, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][key] === value) {
            return i;
        }
    }
    return 'f';
}

var path = "";
$("#good_list_table").ready(function () {
    var count = 0;
    $.get("/checkadmin", function(data){
        if(data.status == 0){
            path = "";
        }else if(data.status == 1){
            path = "/admin";
        }
    good_list_table = $('#good_list_table').DataTable({
    "searching": true,
    "responsive": true,
    "pageLength": 10,
    "order": [
        [0, "asc"]
    ],
    "ajax": {
        "url": path + "/goods/show-goods",
        "method": "POST",
        "data": {
            "_token": "{{ csrf_token()}}",
        },
    },
    'columnDefs': [
        {
            "targets": [0, 1, 2, 3, 4, 5, 6,7],
            "className": "",
        },
    ],
    "columns": [{
            "data": "id",
            "render": function (data, type, full) {
                    count++
                    
                    return count;
                }
        },
        {
            "data": "name",
        },
        {
           "render": function (data, type, full) {
                var text = (full.name_ex);
                // console.log(text)
                return $("<div/>").html(text).text();
            }
        },
        {
            "data": "amount",
            "render": function (data, type, full) {
                var text = `<span style="color : green;"><b>${full.amount - full.defective}</b></span>`;
                if ((full.amount - full.defective) == 0){
                    text = `<span style="color : red;"><b>${full.amount - full.defective}</b></span>`;
                    }
                return text;
            }
        },
        {
            "data": "unit.name",
        },
        {
            "data": "department.name",
        },
        {
                "render": function (data, type, full) {
                    var text = '<span class="badge badge-pill badge-info">ปกติ</span>';
                    if(full.status == 0){
                        text = '<span class="badge badge-pill badge-danger">ชำรุด</span>';
                    }
                    return text;
                }
            },
        {
            "render": function (data, type, full) {
                var obj = JSON.stringify(full);
                var button = `<button type="button" onclick='checkItem(${obj});addToList(${obj});' class="btn btn-primary btn-sm"> <i class="ri-add-fill"></i> เบิก   <span class="badge badge-light" id="m${full.id}"></span> </button>`;
                if((full.amount - full.defective)  == 0){
                    button = `<span class="badge badge-danger">หมดสต๊อก</span>`;
                }
                return  button;
            }
        },
    ],
});
    });
});



</script>
@stop

