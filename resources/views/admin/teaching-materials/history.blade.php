
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
                    <h3>ประวัติการเบิก - คืน วัสดุฝึกสอน</h3>
                </div>

                <div class="ibox-content">
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered" id="history_list_table" style="width:100%; " >
                        <thead>
                            <tr>

                                <th>ลำดับ</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>หน่วย</th>
                                {{-- <th>ประเภท</th> --}}
                                <th>ชื่อผู้ยืม</th>
                                <th>ประเภทผู้ยืม</th>
                                <th>วันที่ทำรายการ</th>
                                <th>สถานะ</th>
                                <th>หมายเหตุ</th>
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs9/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}

<script>
 var history_list_table = '';
$("#history_list_table").ready(function () {
    var count = 0;
    sessionStorage.setItem("count", 0);
     history_list_table = $('#history_list_table').DataTable({
    "searching": true,
    "responsive": true,
    "lengthMenu": [ 10, 25, 50, 75, 100 ],
    "pageLength": 10,
    "order": [
        [0, "asc"]
    ],
    "ajax": {
        "url": "/manage-teaching-materials/show-histories",
        "method": "POST",
        "data": {
            "_token": "{{ csrf_token()}}",
        },
    },
    'columnDefs': [
        {
            "targets": [6,7,8],
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
            "data": "amount",
        },
        {
            "data": "unit",
        },
        // {
        //     "data": "type",
        // },
        {
            "data": "user_name",
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
                    return date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543);
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
                    text = '<span class="badge badge-danger">ไม่อนุมัติ</span>';
                }else if (full.status == 3){
                    text = '<span class="badge badge-primary">คืนแล้ว</span>';
                }else if (full.status == 4){
                    text = '<span class="badge badge-info">ตัดยอด รอดำเนินการ</span>';
                }
                if(full.type == 'สิ้นเปลือง' && full.status == 1){
                    text = '<span class="badge badge-success">ไม่ต้องคืน</span>';
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

                if(full.status == 3){
                    text = `<span class="badge badge-primary" onclick="popNote('${full.note}')">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
                }else if (full.status == 2){
                    text = `<span class="badge badge-danger" onclick="popNote('${full.note}')">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
                }
                if(full.status == 1){
                    text = `<span class="badge badge-warning">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
                }
                if(full.type == 'สิ้นเปลือง' && full.status == 1){
                    text = `<span class="badge badge-success">${date.getDate() + " " + month_name[date.getMonth()] + " " + (date.getFullYear()+543)}</span>`;
                }

                return  text;
            }
        },

    ],
    });
});

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

