<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('main_sidebar.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_sidebar.Programname') }} </li>

        <!-- الاقسام-->
        <li>
            <a href="{{ route('sections') }}"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">الاقسام</span></a>
        </li>

        <!-- الطلاب-->
        <li>
            <a href="{{ route('student.index') }}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">الطلاب</span></a>
        </li>

        <!-- الامتحانات-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">الامتحانات</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('Quizzes.index') }}">قائمة الاختبارات </a></li>
                <li><a href="{{ route('questions.index') }}">قائمة الاسئلة</a></li>
            </ul>

        </li>


        <!-- attendence-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendence-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">التقارير</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="attendence-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('attendance.report') }}">تقرير الحضور والغياب</a></li>
                <li><a href="#">تقرير الامتحانات</a></li>
            </ul>

        </li>

        <!-- الملف الشخصي-->
        <li>
            <a href="{{ route('profile.show') }}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">الملف
                    الشخصي</span></a>
        </li>

    </ul>
</div>
