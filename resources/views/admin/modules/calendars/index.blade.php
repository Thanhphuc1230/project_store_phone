@extends('admin.master')
@section('content')
@section('module', 'Calendar')
@section('action','Create')
   
    

            
            <div class="main_content_iner ">
                <div class="container-fluid p-0 ">
                    <div class="row ">
                        <div class="col-12">
                            <div class="dashboard_header mb_50">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dashboard_header_title">
                                            <h3> Lịch làm việc của nhân viên</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
          
       
       
        <div id="back-top" style="display: none;">
            <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
            </a>
        </div>
        <script src=" {{ asset('style/js/jquery1-3.4.1.min.js ') }}"></script>
        <script src=" {{ asset('style/js/popper1.min.js ') }}"></script>
        <script src=" {{ asset('style/js/bootstrap1.min.js ') }}"></script>
        <script src=" {{ asset('style/js/metisMenu.js ') }}"></script>
        <script src=" {{ asset('style/vendors/count_up/jquery.waypoints.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chartlist/Chart.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/count_up/jquery.counterup.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/niceselect/js/jquery.nice-select.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/owl_carousel/js/owl.carousel.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/jquery.dataTables.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/dataTables.responsive.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/dataTables.buttons.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/buttons.flash.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/jszip.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/pdfmake.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/vfs_fonts.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/buttons.html5.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/datatable/js/buttons.print.min.js ') }}"></script>
        <script src="{{ asset('style/vendors/calender_js/core/main.js ') }}"></script>
        <script src="{{ asset('style/vendors/calender_js/interaction/main.js ') }}"></script>
        <script src="{{ asset('style/vendors/calender_js/daygrid/main.js ') }}"></script>
        <script src="{{ asset('style/vendors/calender_js/timegrid/main.js ') }}"></script>
        <script src="{{ asset('style/vendors/calender_js/list/main.js ') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
              var calendarEl = document.getElementById('calendar');
            
              var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                height: 'parent',
                header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                defaultView: 'dayGridMonth',
                defaultDate: '2020-05-12',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                //   {
                //     title: 'All Day Event',
                //     start: '2020-05-01',
                //     color: '#9267FF' // override!
                //   },
                @foreach($calendars as $calendar)
                  {
                    title: '{{ $calendar->fullname }}',
                
                    start: '{{ $calendar->start }}',
                    end: '{{ $calendar->end }}',
                
                  },
                  @endforeach
                //   {
                //     groupId: 999,
                //     title: 'Repeating Event',
                //     start: '2020-05-09T16:00:00',
                //     color: '#9267FF' // override!
                //   },
                //   {
                //     groupId: 999,
                //     title: 'Repeating Event',
                //     start: '2020-05-16T16:00:00',
                //     color: '#F13D80' // override!
                //   },
                //   {
                //     title: 'Conference',
                //     start: '2020-05-11',
                //     end: '2020-05-13',
                //     color: '#9267FF' // override!
                //   },
                //   {
                //     title: 'Meeting',
                //     start: '2020-05-12T10:30:00',
                //     end: '2020-05-12T12:30:00',
                //     color: '#9267FF' // override!
                //   },
                //   {
                //     title: 'Lunch',
                //     start: '2020-05-12T12:00:00',
                //     color: '#B235DC' // override!
                //   },
                //   {
                //     title: 'Meeting',
                //     start: '2020-05-12T14:30:00',
                //     color: '#9267FF' // override!
                //   },
                //   {
                //     title: 'Happy Hour',
                //     start: '2020-05-12T17:30:00'
                //   },
                //   {
                //     title: 'Dinner',
                //     start: '2020-05-12T20:00:00',
                //     color: '#9267FF' // override!
                //   },
                //   {
                //     title: 'Birthday Party',
                //     start: '2020-05-13T07:00:00',
                //     color: '#9267FF' // override!
                //   }
                ]
              });
            
              calendar.render();
            });
        </script>
        <script src=" {{ asset('style/js/chart.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/progressbar/jquery.barfiller.js ') }}"></s>
            <script src=" {{ asset('style/vendors/tagsinput/tagsinput.js ') }}">
        </script>
        <script src=" {{ asset('style/vendors/text_editor/summernote-bs4.js ') }}"></script>
        <script src=" {{ asset('style/vendors/am_chart/amcharts.js ') }}"></script>
        <script src=" {{ asset('style/vendors/scroll/perfect-scrollbar.min.js ') }}"></script>
        <script src=" {{ asset('style/vendors/scroll/scrollable-custom.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chart_am/core.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chart_am/charts.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chart_am/animated.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chart_am/kelly.js ') }}"></script>
        <script src=" {{ asset('style/vendors/chart_am/chart-custom.js ') }}"></script>
        <script src=" {{ asset('style/js/custom.js ') }}"></script>

@endsection