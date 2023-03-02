
@extends('layouts.admin.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="pull-right">
                        <button type="button" id="addGood" class="btn btn-primary" >
                            <i class="fa fa-plus"></i> เพิ่มครุภัณฑ์
                        </button>
                    </div>
                    <h3>รายการครุภัณฑ์</h3>
                </div>
                <div class="ibox-content">
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="item_list_table" style="width:100%" >
                        <thead>
                            <tr >
                                <th>ลำดับ</th>
                                <th>เลขที่บิล</th>
                                <th>หมายเลขครุภัณฑ์</th>
                                <th>ชื่อครุภัณฑ์</th>
                                <th>กลุ่ม</th>
                                <th>วันที่ซื้อ</th>
                                <th>จำนวน</th>
                                <th>หน่วยนับ</th>
                                <th>สถานะ</th>
                                <th>แก้ไขล่าสุดเมื่อ</th>
                                <th></th>
                                <th>ปรับสถานะ</th>
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

    {{-- add good modal --}}
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">ครุภัณฑ์</h4>
                </div>
                <div class="modal-body">

                <form action="{{ route('manage-goods.store') }}" name="good" id="addGoodForm" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id" >

                    <label><span style="color:red">*</span>เลขที่บิล</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Ex 1235" required>
                    </div>

                    <label><span style="color:red">*</span>หมายเลขครุภัณฑ์</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="good_no" name="good_no" placeholder="Ex 1235" required>

                    </div>

                    <label><span style="color:red">*</span>ชื่อครุภัณฑ์</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex 1235" required>
                    </div>

                    <label><span ></span>กลุ่มย่อย</label>
                    <div class="form-group">
                        <textarea id="name_ex" rows="" style="width: 100%" name="name_ex">

                        </textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>หน่วยงาน</label>
                            <div class="form-group">
                                <select id="department" name="department" class="form-control" required>
                                    <option value="">กรุณาเลือก</option>
                                    @foreach ( $departments as $department)
                                        <option value={{$department->id}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label><span style="color:red">*</span>วันที่ซื้อ</label>
                            <div class="form-group">
                                <input type="date" class="form-control" id="buy_date" name="buy_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label><span style="color:red">*</span>ราคาต่อหน่วย</label>
                            <div class="form-group">
                                <input type="number" min="0" step="0.01" class="form-control" maxlength="8" id="price_unit" name="price_unit" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label><span style="color:red"></span>จำนวนทั้งหมด</label>
                            <div class="form-group">
                                    <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" min="0" class="form-control" maxlength="8" id="amount" name="amount" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6">
                                <label><span style="color:red">*</span>จำนวนที่ใช้ได้</label>
                                <div class="form-group">
                                    <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" step="1" class="form-control" maxlength="8" id="ready_to_use" name="ready_to_use" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label><span style="color:red">*</span>จำนวนที่ชำรุด</label>
                                <div class="form-group">
                                        <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" step="1" class="form-control" maxlength="8" id="defective" name="defective" required>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label><span style="color:red"></span>ราคารวม</label>
                            <div class="form-group">
                                <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" step="0.01" class="form-control" readonly="readonly" maxlength="8" id="total_price" name="total_price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label><span style="color:red">*</span>หน่วยนับ</label>
                            <div class="form-group">
                                <select id="unit" name="unit" class="form-control" required>
                                    <option value="">กรุณาเลือก</option>
                                    @foreach ( $units as $unit)
                                        <option value={{$unit->id}}>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>สถานที่เก็บ/ใช้งาน</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="place" name="place" placeholder="Ex 1235">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>สภาพ</label>
                            <div class="form-group">
                                <select id="stutus" name="status" class="form-control">
                                    <option value=1> ปกติ </option>
                                    <option value=0> ชำรุด </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit"  class="btn btn-primary">บันทึก</button>
                </div>
            </form>

            </div>
        </div>
    </div>

    {{-- show info modal --}}

      <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalCenterTitle">ข้อมูลรายละเอียดครุภัณฑ์</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6"><b>เลขที่บิล : </b><span class="label label-primary" id="bill_no_"></span></div>
                    <div class="col-md-6"><b>หมายเลขครุภัณฑ์ : </b><span class="label label-primary" id="good_no_"></span></div><br><br>

                    <div class="col-md-6"><b>ชื่อครุภัณฑ์ : </b><span class="label label-primary" id="name_"></span></div>
                    <div class="col-md-6"><b>หน่วยงาน : </b><span  class="label label-primary" id="department_"></span></div><br><br>

                    <div class="col-md-6"><b>วันที่ซื้อ : </b><span class="label label-primary" id="buy_date_"></span></div>
                    <div class="col-md-6"><b>จำนวน : </b><span class="label label-primary" id="amount_"></span> <span class="label label-primary" id="unit_"></div><br><br>

                    <div class="col-md-6"><b>ราคาต่อหน่วย : </b><span class="label label-primary" id="price_unit_"></span> บาท</div>
                    <div class="col-md-6"><b>ราคารวม : </b><span class="label label-primary" id="total_price_"></span> บาท</div><br><br>

                    <div class="col-md-6"><b>สถานที่เก็บ : </b><span class="label label-primary" id="place_"></span></div>
                    <div class="col-md-6"><b>สถานะ : </b><span class="label label-primary" id="status_" ><span></div><br><br>

                    <div class="col-md-12"><b>กลุ่ม : </b> <br><br> <div id="name_ex_" ><div> </div><br><br>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 42px;
  height: 18px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #FF0000;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 10px;
  width: 10px;
  left: 3px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #1ab394;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script>

var month_name = new Array(12);
    month_name[0] = "ม.ค.";
    month_name[1] = "ก.พ.";
    month_name[2] = "ม.ค.";
    month_name[3] = "เม.ย.";
    month_name[4] = "พ.ค.";
    month_name[5] = "มิ.ย.";
    month_name[6] = "ก.ค.";
    month_name[7] = "ส.ค.";
    month_name[8] = "ก.ย.";
    month_name[9] = "ต.ค.";
    month_name[10] = "พ.ย.";
    month_name[11] = "ธ.ค.";

$(document).ready( function () {
    CKEDITOR.replace('name_ex');
} );

var count = 0;
$("#item_list_table").ready(function () {
    sessionStorage.setItem("count", 0);
    item_list_table = $('#item_list_table').DataTable({
        "searching": true,
        "responsive": true,
        "pageLength": 10,
        "order": [
            [0, "asc"]
        ],
        "ajax": {
            "url": "/manage-goods/show-goods",
            "method": "POST",
            "data": {
                "_token": "{{ csrf_token()}}",
            },
        },
        'columnDefs': [
            {
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                "className": "",
            },
        ],
        "columns": [{
                "render": function (data, type, full) {
                    count++
                    return count;
                }
            },
            {
                "data": "bill_no",
            },
            {
                "data": "good_no",
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


            // {
            //     "data": "department.name",
            // },
            // {
            //     "data": "place",
            // },
            {
                "render": function (data, type, full) {
                    var date = new Date(full.buy_date);
                    return date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543) ;
                }
            },
            {
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
                    var date = new Date(full.created_at);
                    return date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543) ;
                }
            },

            {
                "render": function (data, type, full) {
                    var obj = JSON.stringify(full);
                    return `<button type="button" onclick='infoGood(${obj})' class="btn btn-success btn-sm">ดูรายละเอียด</button>
                            <button type="button" onclick='addAmount(${full.id})' class="btn btn-primary btn-sm">เพิ่ม</button>
                            <button class="btn btn-warning btn-sm" onclick='editGood(${obj})''> แก้ไข</button>
                            `;
                }
            },
            {
                "render": function (data, type, full) {
                    // var obj = JSON.stringify(full);
                    var text = `<label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                            </label>`;
                    if(full.active == 0){
                        text = `<label class="switch">
                            <input type="checkbox" onchange="changeGood(${full.id})">
                            <span class="slider round"></span>
                            </label>`;
                    }
                    if(full.active == 1){
                        text = `<label class="switch">
                            <input type="checkbox" checked onchange="changeGood(${full.id})">
                            <span class="slider round"></span>
                            </label>`;
                    }
                    return text;
                }
            },
        ],
    });

});

$('#price_unit, #amount').on('change keyup', function() {
    var priceUnit = $("#price_unit").val();
    var amount = $("#amount").val();
    // console.log(priceUnit);
    // console.log(amount);
    if(priceUnit && amount){
        var totalPrice = priceUnit * amount;
        $("#total_price").val(totalPrice);
        // console.log('total_price : '+totalPrice);
    }
    if(priceUnit == undefined || amount == undefined || priceUnit == '' || amount == ''){
        $("#total_price").val('');
        // console.log('total_price : '+totalPrice);
    }
});

$( "#addGood" ).click(function() {
    $('.form-control').closest('form').find("input[type=text], input[type=number], input[type=date]").val("");
     CKEDITOR.instances["name_ex"].setData("");
    $('#addItemModal').modal('show');
    console.log('ok');
});

function changeGood(id) {
    Swal.fire({
        title: 'คุณมั่นใจหรือไม่ ?',
        text: "คุณต้องการปรับสถานะรายการหรือไม่ ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1ab394',
        cancelButtonColor: '#FF0000',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง',
    }).then((result) => {
        if (result.value) {
            $.post("/manage-goods/change", data = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                function (res) {
                    // console.log(res.msg);
                    Swal.fire(res.title, res.msg, res.status);
                    count = 0;
                    item_list_table.ajax.reload();
                },
            );
        }else{
            count = 0;
            item_list_table.ajax.reload();
        }
    });
}

function deleteGood(id) {
    Swal.fire({
        title: 'คุณมั่นใจหรือไม่ ?',
        text: "คุณค้องการลบการรายการนี้ใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7A7978',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง',
    }).then((result) => {
        if (result.value) {
            $.post("/manage-goods/delete", data = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                function (res) {
                    Swal.fire(res.title, res.msg, res.status);
                    item_list_table.ajax.reload();
                },
            );
        }
    });
}

function editGood(good) {
    var id = $('#id').val(good.id);
    var bill_no = $('#bill_no').val(good.bill_no);
    var good_no = $('#good_no').val(good.good_no);
    var name = $('#name').val(good.name);
    var department = $('#department').val(good.department.id);
    var buy_date = moment(good.buy_date).format('YYYY-MM-DD');
    $('#buy_date').val(buy_date);
    var price_unit = $('#price_unit').val(good.price_unit);
    var amount = $('#amount').val(good.amount);
    var unit = $('#unit').val(good.unit.id);
    var total_price = $('#total_price').val(good.price_unit * good.amount);
    var place = $('#place').val(good.place);
    var status = $('#status').val(good.status);

    CKEDITOR.instances["name_ex"].setData(good.name_ex);


    var ready_to_use = $('#ready_to_use').val(good.ready_to_use);
    var defective = $('#defective').val(good.defective);

    // console.log('ready_to_use : ' + good.ready_to_use)
    // console.log('price_unit : ' + good.price_unit)
    //    console.log(good.ready_to_use * good.price_unit)

    $('#addItemModal').modal('show');
    console.log('ok');
}

function infoGood(good) {
    // console.log(good);
    $('#infoModal').modal('show');
    $('#id_').text(good.id);
    $('#bill_no_').text(good.bill_no);
    $('#good_no_').text(good.good_no);
    $('#name_').text(good.name);
    $('#department_').text(good.department.name);
    var date = new Date(good.buy_date);
    var buy_date = date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543);
    $('#buy_date_').text(buy_date);
    $('#price_unit_').text(good.price_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    $('#amount_').text(good.amount);
    $('#unit_').text(good.unit.name);
    var totalPrice = good.price_unit * good.amount;
    $('#total_price_').text(totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    $('#place_').text(good.place);
    $('#name_ex_').html(good.name_ex);
    // $('#name_ex_').text(htmlentities(good.name_ex));
    if(good.status == 1)
        var text = 'ปกติ';
    else
        var text = 'ชำรุด';
    $('#status_').text(text);
    console.log('ok');
}


function addAmount(id){

Swal.fire({
    title: "กรอกจำนวนที่ต้องการเพิ่ม",
    text: "กรอกเฉพาะตัวเลขเท่านั้น",
    input: 'number',
    showCancelButton: true,
    confirmButtonColor: '#1ab394',
    cancelButtonColor: '#FF0000',
    cancelButtonText: 'ยกเลิก',
    confirmButtonText: 'ตกลง',
    inputValue: 1,
    inputAttributes: {
        step: 1,
        min: 1,
    },
    inputValidator: (value) => {
        if (value < 1) {
            return 'จำนวนต้องมากกว่า 1 เท่านั้น'
        }
           if (value % 1 != 0)
        {
             return 'ต้องเป็นจำนวนเต็มเท่านั้น'
        }
    }
}).then((result) => {
    if (result.value) {
        // console.log("Result: " + result.value);
        $.post("/manage-goods/add-amount", data = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    amount: result.value,
                },
                function (res) {
                    swal.fire(res.title, res.msg, res.status);
                    item_list_table.ajax.reload(null, false);
                },
        );
    }
});
}

$('#ready_to_use, #defective').on('change keyup', function() {
    var ready_to_use = $("#ready_to_use").val();
    var defective = $("#defective").val();
    // console.log(ready_to_use);
    // console.log(defective);
    if(ready_to_use && defective){
        var amount = parseInt(ready_to_use) + parseInt(defective);
        $("#amount").val(amount);
        // console.log('amount : '+amount);
    }
    if(ready_to_use == undefined || defective == undefined || ready_to_use == '' || defective == ''){
        $("#amount").val(0);
        // console.log('amount : '+amount);
    }
});


</script>
@stop
