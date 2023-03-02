<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" style=" width: 30%; height: auto;" class="img-circle" src="/img/avatar.png" />
                    </span>
                    <span data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                        </span>
                    </span>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>

                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    BR+
                </div>
            </li>
            @if(Auth::user()->is_admin == 0)
            <li class="">
                <a id="home" ><i class="fa-solid fa-house"></i> <span class="nav-label">หน้าแรก</span> </a>
            </li>
            @endif
            @if(Auth::user()->is_admin == 1)
            <li class="">
                <a id="admin" ><i class="fa-solid fa-house"></i> <span class="nav-label">หน้าแรก</span> </a>
            </li>
            @endif

            @if(Auth::user()->status == '1')
            @if(Auth::user()->type != 'Students')
            <li class="{{ route::is('goods.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">-- ครุภัณฑ์ --</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('goods.index') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="gborrow">เบิกครุภัณฑ์</a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-gborrow">เบิกครุภัณฑ์</a>
                        @endif
                    </li>
                    <li class="{{ route::is('goods.history') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="ghistory">ประวัติการ เบิก-คืน ครุภัณฑ์</a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-ghistory" >ประวัติการ เบิก-คืน ครุภัณฑ์</a>
                        @endif
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->type != 'Students')
            <li class="{{ route::is('materials.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">-- วัสดุสำนักงาน --</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('materials.index') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="mborrow">เบิกวัสดุสำนักงาน</a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-mborrow">เบิกวัสดุสำนักงาน</a>
                        @endif
                    </li>
                    <li class="{{ route::is('materials.history') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="mhistory">ประวัติการ เบิก-คืน วัสดุสำนักงาน</a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-mhistory">ประวัติการ เบิก-คืน วัสดุสำนักงาน</a>
                        @endif
                    </li>
                </ul>
            </li>
            @endif

            <li class="{{ route::is('teaching-materials.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">-- วัสดุฝึกสอน --</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('teaching-materials.index') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="tborrow" >เบิกวัสดุฝึกสอน </a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-tborrow">เบิกวัสดุฝึกสอน</a>
                        @endif
                    </li>
                    <li class="{{ route::is('teaching-materials.history') ? 'active' : '' }}">
                        @if(Auth::user()->is_admin == 0)
                        <a id="thistory">ประวัติการ เบิก-คืน วัสดุฝึกสอน </a>
                        @endif
                        @if(Auth::user()->is_admin == 1)
                        <a id="admin-thistory">ประวัติการ เบิก-คืน วัสดุฝึกสอน</a>
                        @endif
                    </li>
                </ul>
            </li>

            @if(Auth::user()->is_admin == 1)
            <li class="{{ route::is('manage-goods.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการครุภัณฑ์</span> <span class="label label-warning pull-right numGood">  <span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('manage-goods.index') ? 'active' : '' }}">
                        <a id="gmanage">จัดการรายการครุภัณฑ์</a>
                    </li>
                    <li class="{{ route::is('manage-goods.approve') ? 'active' : '' }}">
                        <a id="gapprove">อนุมัติ เบิก-คืน ครุภัณฑ์ <span class="label label-warning pull-right numGood">  <span></a>
                    </li>
                    <li class="{{ route::is('manage-goods.history') ? 'active' : '' }}">
                        <a id="manage-ghistory">ประวัติการ เบิก-คืน ครุภัณฑ์</a>
                    </li>
                </ul>
            </li>
            

            <li class="{{ route::is('manage-materials.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการวัสดุสำนักงาน</span> <span class="label label-warning pull-right numMat"> </span> </a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('manage-materials.index') ? 'active' : '' }}">
                        <a id="m-manage">จัดการรายการวัสดุ</a>
                    </li>
                    <li class="{{ route::is('manage-materials.approve') ? 'active' : '' }}">
                        <a id="m-approve">อนุมัติ เบิก-คืน วัสดุ <span class="label label-warning pull-right numMat">  <span></a>
                    </li>
                    <li class="{{ route::is('manage-materials.history') ? 'active' : '' }}">
                        <a id="manage-mhistory">ประวัติการ เบิก-คืน วัสดุ</a>
                    </li>
                </ul>
            </li>

            <li class="{{ route::is('manage-teaching-materials.*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการวัสดุฝึกสอน</span> <span class="label label-warning pull-right numTMat"> </span> </a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('manage-teaching-materials.index') ? 'active' : '' }}">
                        <a id="tm-manage">จัดการรายการวัสดุ</a>
                    </li>
                    <li class="{{ route::is('manage-teaching-materials.approve') ? 'active' : '' }}">
                        <a id="tm-approve">อนุมัติ เบิก-คืน วัสดุ <span class="label label-warning pull-right numTMat">  <span></a>
                    </li>
                    <li class="{{ route::is('manage-teaching-materials.history') ? 'active' : '' }}">
                        <a id="manage-tmhistory">ประวัติการ เบิก-คืน วัสดุ</a>
                    </li>
                </ul>
            </li>

            <li class="{{ route::is('generals.*') ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-gears"></i> <span class="nav-label">ตั้งค่าทั่วไป</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('generals.manage-units.index') ? 'active' : '' }}">
                        <a id="manageunit">ตั้งค่าหน่วยนับ</a>
                    </li>
                    <li class="{{ route::is('generals.manage-departments.index') ? 'active' : '' }}">
                        <a id="managedepartments">ตั้งค่าหน่วยงาน</a>
                    </li>
                    <li class="{{ route::is('generals.manage-types.index') ? 'active' : '' }}">
                        <a id="managetypes">ตั้งค่าประเภทวัสดุ</a>
                    </li>
                     <li class="{{ route::is('generals.manage-shops.index') ? 'active' : '' }}">
                        <a id="manageshops">ตั้งค่าร้านค้า</a>
                    </li>
                </ul>
            </li>

            <li class="{{ route::is('reports.*') ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-sheet-plastic"></i> <span class="nav-label">รายงาน</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('reports.goods.index') ? 'active' : '' }}">
                        <a id="greport">รายงานครุภัณฑ์</a>
                    </li>
                     <li class="{{ route::is('reports.mats.index') ? 'active' : '' }}">
                        <a id="mreport">รายงานวัสดุสำนักงาน</a>
                    </li>

                    <li class="{{ route::is('reports.teaching-mats.index') ? 'active' : '' }}">
                        <a id="tmreport">รายงานวัสดุฝึกสอน</a>
                    </li>
                </ul>
            </li>

            <li class="{{ route::is('access.*') ? 'active' : '' }}">
                <a href="#"><i class="fa-solid fa-users-gear"></i> <span class="nav-label">จัดการผู้ใช้งาน</span> <span class="label label-warning pull-right numUser"> </span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ route::is('access.approve') ? 'active' : '' }}">
                        <a id="userapprove" >ผู้ใช้งานใหม่ <span class="label label-warning pull-right numUser">  </span></a>
                    </li>
                    <li class="{{ route::is('access.index') ? 'active' : '' }}">
                        <a id="userall" >ผู้ใช้งานทั้งหมด</a>
                    </li>
                </ul>
            </li>
            @endif
            @endif

        </ul>

    </div>
</nav>
