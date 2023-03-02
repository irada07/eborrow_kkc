
@extends('layouts.admin.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="pull-right">
                        {{-- <button type="button" id="modal1Btn" class="btn btn-primary" >
                            <i class="fa fa-plus"></i> สร้างบิล
                        </button> --}}
                        <button type="button" id="modal2Btn" class="btn btn-primary">
                            <i class="fa fa-plus"></i> เพิ่มรายการวัสดุฝึกสอน
                        </button>
                    </div>
                    <h3>รายการวัสดุฝึกสอน</h3>
                </div>

                <div class="ibox-content">
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="item_list_table" style="width:100%;" >
                        <thead>
                            <tr >

                                <th>ลำดับ</th>
                                <th>เลขที่บิล</th>
                                <th>ร้านค้า</th>
                                <th>ชื่อวัสดุ</th>
                                {{-- <th>ประเภทวัสดุ</th> --}}
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวนคงเหลือ</th>
                                <th>หน่วยนับ</th>
                                {{-- <th>จำนวนเงิน</th> --}}
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
    {{-- <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มบิล</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage-materials.add-bill') }}" id="addMaterialForm" method="POST">
                        @csrf
                        <label><span style="color:red">*</span>เลขที่บิล</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bill_code" name="bill_code" placeholder="Ex 1235" required>
                        </div>

                        <label><span style="color:red">*</span>วันที่ออกบิล</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="doc_date" name="doc_date"  required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                            <button type="submit"  class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}

    {{-- add good modal --}}
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">รายการวัสดุฝึกสอน</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('manage-teaching-materials.store') }}" id="addMaterialForm" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" >

                        <label><span style="color:red">*</span>เลขที่บิล</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Ex 1235" required>
                        </div>

                        <label>ร้านค้า</label>
                        <div class="form-group">
                            <select name="shop" id="shop" class="form-control">
                                 <option value="">  -- เลือกร้านค้า --</option>
                                @foreach ($shops as $shop)
                                 <option value="{{$shop->id }}"> {{ $shop->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <label><span style="color:red">*</span>ชื่อวัสดุ</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ex 1235" required>
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
                                        <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" maxlength="8" id="amount" name="amount" required readonly>
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

                            <div class="col-md-6">
                                <label>สถานที่เก็บ/ใช้งาน</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="place" name="place" placeholder="เช่น คณะวิศวกรรมศาสตร์">
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <label><span style="color:red">*</span>ประเภทวัสดุ</label>
                                <div class="form-group">
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="">กรุณาเลือก</option>
                                        @foreach ( $types as $type)
                                            <option value={{$type->id}}>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                            <button type="submit"  class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}
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


$( "#modal1Btn" ).click(function() {
    $('#modal1').modal('show');
    console.log('ok');
});


$( "#modal2Btn" ).click(function() {
    $('#modal2').modal('show');
    console.log('ok');
});
var item_list_table = '';

var count = 0;
$("#item_list_table").ready(function () {
    sessionStorage.setItem("count", 0);
     item_list_table = $('#item_list_table').DataTable({
        "searching": true,
        "responsive": true,
        "lengthMenu": [ 10, 25, 50, 75, 100 ],
        // "pageLength": 10,
        "order": [
            [0, "asc"]
        ],
        "ajax": {
            "url": "/manage-teaching-materials/show-materials",
            "method": "POST",
            "data": {
                "_token": "{{ csrf_token()}}",
            },
        },
        'columnDefs': [
            {
                "targets": [7,8],
                "className": "text-center",
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
                "data": "bill_no",
            },
                {
                "data": "id",
                "render": function (data, type, full) {
                    var text = '';
                    if(full.shop){
                        text = full.shop.name
                    }
                    return text;
                }
            },

            {
                "data": "name",
            },
            // {
            //     "data": "type.name",
            // },
            {
                "render": function (data, type, full) {
                    return full.price_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
                "render": function (data, type, full) {
                    var date = new Date(full.created_at);
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
                    return date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543) ;
                }
            },
            {
                "render": function (data, type, full) {
                    var obj = JSON.stringify(full);
                    // <button type="button" onclick='infoMaterial(${obj})' class="btn btn-success btn-sm">ดูรายละเอียด</button>
                    return `
                            <button type="button" onclick='addAmount(${full.id})' class="btn btn-success btn-sm">เพิ่ม</button>
                            <button class="btn btn-warning btn-sm" onclick='editMaterial(${obj})'> แก้ไข</button>
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
                            <input type="checkbox" onchange="changeTeachingMaterial(${full.id})">
                            <span class="slider round"></span>
                            </label>`;
                    }
                    if(full.active == 1){
                        text = `<label class="switch">
                            <input type="checkbox" checked onchange="changeTeachingMaterial(${full.id})">
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
    console.log(priceUnit);
    console.log(amount);
    if(priceUnit && amount){
        var totalPrice = priceUnit * amount;
        $("#total_price").val(totalPrice);
        console.log('total_price : '+totalPrice);
    }
    if(priceUnit == undefined || amount == undefined || priceUnit == '' || amount == ''){
        $("#total_price").val('');
        console.log('total_price : '+totalPrice);
    }
});

function changeTeachingMaterial(id) {
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
            $.post("/manage-teaching-materials/change", data = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                function (res) {
                    console.log(res.msg);
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

function deleteMaterial(id) {
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
            $.post("/manage-teaching-materials/delete", data = {
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

$( "#addMaterialBtn" ).click(function() {

    $('.form-control').closest('form').find("input[type=text], input[type=number], input[type=date]").val("");
    // $('#amount').val('').attr('readonly', false);
    $('#addItemModal').modal('show');
    console.log('ok');
});

function editMaterial(material) {
    var id = $('#id').val(material.id);
    var bill_no = $('#bill_no').val(material.bill_no);
    var name = $('#name').val(material.name);
    var price_unit = $('#price_unit').val(material.price_unit);
    // var amount = $('#amount').val(material.amount).attr('readonly', true);
    var amount = $('#amount').val(material.amount);
    var unit = $('#unit').val(material.unit.id);
    var total_price = $('#total_price').val(material.amount * material.price_unit);
    // var type = $('#type').val(material.type.id);
    var shop = $('#shop').val(material.shop_id);
    var place = $('#place').val(material.place);

    var ready_to_use = $('#ready_to_use').val(material.ready_to_use);
    var defective = $('#defective').val(material.defective);
    $('#modal2').modal('show');
    console.log('ok');
}

function infoMaterial(material) {
    $("#shop").val(material.shop_id);
    console.log(material);
    $('#id_').text(material.id);
    $('#bill_no_').text(material.bill_no);
    $('#name_').text(material.name);;
    $('#price_unit_').text(material.price_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    $('#amount_').text(material.amount);
    $('#unit_').text(material.unit.name);
    $('#total_price_').text(material.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    // $('#type_').text(material.type.name);
    $('#updated_at_').text(material.updated_at);
    $('#infoModal').modal('show');

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
            console.log("Result: " + result.value);
            $.post("/manage-teaching-materials/add-amount", data = {
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
    console.log(ready_to_use);
    console.log(defective);
    if(ready_to_use && defective){
        var amount = parseInt(ready_to_use) + parseInt(defective);

        $("#amount").val(amount);
        console.log('amount : '+amount);
    }
    if(ready_to_use == undefined || defective == undefined || ready_to_use == '' || defective == ''){
        $("#amount").val('');
        console.log('amount : '+amount);
    }
});


</script>
@stop
