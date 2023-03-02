
@extends('layouts.admin.app')

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
    </style>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="pull-right">

                    </div>
                    <h3>อนุมัติการเบิก - คืน ครุภัณฑ์</h3>
                </div>

                <div class="ibox-content">
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="approve_list_table" style="width:100%" >
                        <thead>
                            <tr>

                                <th>ลำดับ</th>
                                <th>เลขครุภัณฑ์</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>หน่วย</th>
                                <th>ชื่อผู้ยืม</th>
                                <th>ประเภทผู้ยืม</th>
                                <th>วันที่ทำรายการ</th>
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
<div class="modal fade" id="notemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="exampleModalLabel">เหตุผลที่ไม่อนุมัติ</h3>
        </div>
        <div class="modal-body text-center" >
            <span style="font-size: 150%" class="notepreview"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}

<script>

 var approve_list_table = $('#approve_list_table');

$("#approve_list_table").ready(function () {
    var count = 0;
    sessionStorage.setItem("count", 0);

    approve_list_table = $('#approve_list_table').DataTable({
    "searching": true,
    "responsive": true,
    "pageLength": 10,
    "order": [
        [0, "asc"]
    ],
    "ajax": {
        "url": "/manage-goods/show-histories",
        "method": "POST",
        "data": {
            "_token": "{{ csrf_token()}}",
        },
    },
    'columnDefs': [
        {
            "targets": [7, 8 , 9],
            "className": "text-center",
        },
    ],
    "columns": [
        {
            "data": "id",
            "render": function (data, type, full) {
                    count++
                    
                    return count;
                }
        },
        {
            "data": "good.good_no",
        },
        {
            "data": "good.name",
        },
        {
            "data": "amount",
        },
        {
            "data": "good.unit.name",
        },
        {
            "data": "user.name",
        },
        {
         "render": function (data, type, full) {
            var text = full.user.type
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
            var text = '';
                if(full.status == 0){
                    text = '<span class="badge badge-warning">รอดำเนินการ</span>';
                }else if (full.status == 1){
                    text = '<span class="badge badge-warning">ยังไม่คืน</span>';
                }else if (full.status == 2){
                    text = '<span class="badge badge-danger" >ไม่อนุมัติ</span>';
                }else if (full.status == 3){
                    text = '<span class="badge badge-primary">คืนแล้ว</span>';
                }else if (full.status == 4){
                    text = '<span class="badge badge-info">ตัดยอด รอดำเนินการ</span>';
                }
                return  text;
            }
        },
        {
        "render": function (data, type, full) {
            var text = '';
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

            if(full.status == 1){
                text = `<button class="btn btn-primary btn-sm" onclick="updateStatus(${full.id},3)"><i class="ri-checkbox-circle-fill"></i> คืน </button>`;
            }else if(full.status == 0 ){
                text = `<button class="btn btn-primary btn-sm" onclick="updateStatus(${full.id},1)"><i class="ri-checkbox-circle-fill"></i> อนุมัติ </button>
                        <button class="btn btn-danger btn-sm" onclick="updateStatus(${full.id},2)"><i class="ri-close-circle-fill"></i> ไม่อนุมัติ </button>
                        `;
            }else if (full.status == 2){
                text = `<span class="badge badge-danger" onclick="popNote('${full.note}')">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
            }else if (full.status == 3){
                text = `<span class="badge badge-primary" onclick="popNote('${full.note}')">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
            }else if (full.status == 4){
                text = `<button class="btn btn-primary btn-xs" onclick="updateStatus(${full.id},1)"><i class="ri-checkbox-circle-fill"></i> อนุมัติ </button>
                        <button class="btn btn-danger btn-xs" onclick="updateStatus(${full.id},2)"><i class="ri-close-circle-fill"></i> ไม่อนุมัติ </button>
                        `;
            }
            return  text;
            }
        },


    ],
    });
});


function updateStatus(id,status){
    if(status == 2){

        var text = ''

        Swal.fire({
            title: "ไม่อนุมัติ!",
            text: "กรุณากรอกเหตุผลที่ไม่อนุมัติ:",
            input: 'text',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#1ab394',
            cancelButtonColor: '#FF0000',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.value) {
                text = result.value;
                Swal.fire({
                    title: 'คุณมั่นใจหรือไม่ ?',
                    text: "คุณมั่นใจที่จะดำเนินการต่อไปหรือไม่",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1ab394',
                    cancelButtonColor: '#FF0000',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',

                }).then((result) => {
                    if (result.value) {
                        $.post("/manage-goods/approve-borrow", data = {
                                _token: '{{ csrf_token() }}',
                                id: id,
                                status: status,
                                text: text,
                            },
                            function (res) {
                                swal.fire(res.title, res.msg, res.status);
                                approve_list_table.ajax.reload();
                                countMatApprove();
                            },
                        );

                    }
                });
            }
        });

    }else if(status == 3){

            var text = ''

            Swal.fire({
                title: "คืนครุภัณฑ์!",
                text: "หมายเหตุ:",
                input: 'text',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonColor: '#1ab394',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.value) {
                    text = result.value;
                    Swal.fire({
                        title: 'คุณมั่นใจหรือไม่ ?',
                        text: "คุณมั่นใจที่จะดำเนินการต่อไปหรือไม่",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1ab394',
                        cancelButtonColor: '#FF0000',
                        confirmButtonText: 'ตกลง',
                        cancelButtonText: 'ยกเลิก',

                    }).then((result) => {
                        if (result.value) {
                            $.post("/manage-goods/approve-borrow", data = {
                                    _token: '{{ csrf_token() }}',
                                    id: id,
                                    status: status,
                                    text: text,
                                },
                                function (res) {
                                    swal.fire(res.title, res.msg, res.status);
                                    approve_list_table.ajax.reload();
                                    countMatApprove();
                                },
                            );

                        }
                    });
                }
            });

}else{

        Swal.fire({
            title: 'คุณมั่นใจหรือไม่ ?',
            text: "คุณมั่นใจที่จะดำเนินการต่อไปหรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1ab394',
            cancelButtonColor: '#FF0000',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',

        }).then((result) => {
            if (result.value) {
                $.post("/manage-goods/approve-borrow", data = {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status,
                    },
                    function (res) {
                        swal.fire(res.title, res.msg, res.status);
                        approve_list_table.ajax.reload();
                        countGoodApprove();
                    },
                );

            }
        });

    }



}

function popNote(text){
    console.log('OK');
    if(text == null){
        text = '';
    }
    $('.notepreview').text(text);
    $('#notemodal').modal('show');
}
</script>
@stop

