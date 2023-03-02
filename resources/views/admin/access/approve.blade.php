
@extends('layouts.admin.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    
                    <h3>รายการสมาชิกใหม่</h3>
                </div>

                <div class="ibox-content">
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="item_list_table" style="width:100%;" >
                        <thead>
                            <tr >

                                <th>#</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>อีเมล</th>
                                <th>ประเภท</th>
                                <th>ระดับผู้ใช้งาน</th>
                                <th>สถานะ</th>
                                <!-- <th>หน่วยนับ</th> -->
                                <th>วันที่ลงทะเบียน</th>
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
    
    {{-- add good modal --}}
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">รายการวัสดุสำนักงาน</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('access.manage') }}" id="addMaterialForm" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" >

                        <label>ชื่อผู้ใช้งาน</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ex 1235" readonly>
                        </div>

                        <label>อีเมล</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ex 1235" readonly>
                        </div>

                        <label>ประเภท</label>
                        <div class="form-group">
                            <select name="type" id="type" class="form-control">
                                 <option value="">  -- เลือกประเภท --</option>                                
                                 <option value="Students">นักศึกษา</option>
                                 <option value="Teachers">อาจารย์</option>
                            </select>
                        </div>

                        <label>ระดับผู้ใช้งาน</label>
                        <div class="form-group">
                            <select name="is_admin" id="is_admin" class="form-control">
                                 <option value="">  -- เลือกระดับผู้ใช้งาน --</option>                                
                                 <option value="0">ผู้ใช้งานทั่วไป</option>
                                 <option value="1">ผู้ดูแลระบบ</option>
                            </select>
                        </div>

                        <label>สถานะ</label>
                        <div class="form-group">
                            <select name="status" id="status" class="form-control">
                                 <option value="">  -- เลือกสถานะ --</option>                                
                                 <option value="0">De-Active</option>
                                 <option value="1">Active</option>
                            </select>
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

<script>

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
            [5, "asc"]
        ],
        "ajax": {
            "url": "/access/listapproveusers",
            "method": "GET",
            "data": {
                "_token": "{{ csrf_token()}}",
            },
        },
        'columnDefs': [
            {
                "targets": [6,7],
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
                "data": "name",
            },
            {
                "data": "email",
            },
            {
                "data": "type",
            },
            {
                "data": "is_admin",
                "render": function (data, type, full) {
                     var text = `<span style="color : green;"><b>ผู้ดูแลระบบ</b></span>`;
                    if (full.is_admin == 0){
                        text = `<span style="color : gray;"><b>ผู้ใช้งานทั่วไป</b></span>`;
                    }
                    return text;
                }
            },
            {
                "data": "status",
                "render": function (data, type, full) {
                     var text = `<span style="color : green;"><b>Active</b></span>`;
                    if (full.status == 2){
                        text = `<span style="color : orange;"><b>Wait</b></span>`;
                    }
                    return text;
                }
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
                            
                            <button class="btn btn-primary btn-sm" onclick='activeUser(${full.id})'> ยืนยัน</button>
                            <button class="btn btn-danger btn-sm" onclick='deactiveUser(${full.id})'> ปฏิเสธ</button>
                            `;
                }
            },
        ],
    });
});

function editMaterial(material) {
    var id = $('#id').val(material.id);
    //     $('#shop_').val(material.shop_id);
    var bill_no = $('#name').val(material.name);
    var name = $('#email').val(material.email);
    var price_unit = $('#is_admin').val(material.is_admin);
    // var amount = $('#amount').val(material.amount).attr('readonly', true);
    var amount = $('#type').val(material.type);
    var unit = $('#status').val(material.status);
    // var total_price = $('#total_price').val(material.amount * material.price_unit);
    // // var type = $('#type').val(material.type.id);
    // var shop = $('#shop').val(material.shop_id);
    // var place = $('#place').val(material.place);

    // var ready_to_use = $('#ready_to_use').val(material.ready_to_use);
    // var defective = $('#defective').val(material.defective);

    $('#modal2').modal('show');
    console.log('ok');
}

function activeUser(id) {
    Swal.fire({
        title: 'ยืนยันการอนุมัติสิทธิ์ ?',
        text: "คุณต้องการยืนยันการทำรายการนี้ใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1ab394',
        cancelButtonColor: '#FF0000',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง',
    }).then((result) => {
        if (result.value) {
            $.post("/access/activeuser", data = {
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

function deactiveUser(id) {
    Swal.fire({
        title: 'ยืนยันการไม่อนุมัติสิทธิ์ ?',
        text: "คุณต้องการยืนยันการทำรายการนี้ใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1ab394',
        cancelButtonColor: '#FF0000',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง',
    }).then((result) => {
        if (result.value) {
            $.post("/access/deactiveuser", data = {
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

</script>
@stop
