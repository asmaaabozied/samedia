@extends('layouts.main_admin')
@section('content')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3></h3>
                    </div>
                    <div class="col-6">
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>--}}
{{--                            <li class="breadcrumb-item">Dashboard</li>--}}
{{--                            <li class="breadcrumb-item active">Default      </li>--}}
{{--                        </ol>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
                <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                    <div class="card profile-greeting">
                        <div class="card-body pb-0">
                            <div class="media">
                                <div class="media-body">
                                    <div class="greeting-user">
                                        <h4 class="f-w-600 font-primary" id="greeting">{{__('site.Good Morning')}}</h4>
                                        <p>{{__('site.God Almighty loves that when one of you performs a deed, he should be perfect.')}}</p>
                                        <div class="whatsnew-btn"><a class="btn btn-primary">{{__('site.Happy Day')}}</a></div>
                                    </div>
                                </div>
                                <div class="badge-groups">
                                </div>
                            </div>
                            <div class="cartoon"><img class="img-fluid" src="{{MAINASSETS}}/images/dashboard/cartoon.png" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                    <div class="card earning-card">
                        <div class="card-body p-0">
                            <div class="row m-0">
                                <div class="col-xl-12 p-0">
                                    <div class="chart-right">
                                        <div class="row m-0 p-tb">
                                            <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                                                <div class="inner-top-right">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card-body p-0">
                                                    <div class="current-sale-container">
                                                        <div id="vc-chart"></div>
                                                            <script>
                                                                window.addEventListener('load', () => {
                                                                    /*======> Config Chart <========*/
                                                                    let chartConfigs = {
                                                                            type: "column2d",
                                                                            renderAt: 'chart-container',
                                                                            width: "100%",
                                                                            height: "480",
                                                                            //=====> Data Set via json File <=====//
                                                                            dataFormat: "json",
                                                                            dataSource: 
                                                                            {
                                                                                "chart": {
                                                                                    "caption": "{{__('site.Main Statistics')}}",
                                                                                    "subCaption": "",
                                                                                    "baseFont": "DIN NEXT",
                                                                                    "theme": "fusion",
                                                                                    "exportEnabled":true,
                                                                                    "paletteColors": "#60CE76,#4831d4,#2E3E5F,#ea2087,#ac4e444e,#F9C832"
                                                                                },
                                                                                "data": [{
                                                                                    "label": "{{__('site.cars')}}",
                                                                                    "value": "{{$cars}}"
                                                                                }, {
                                                                                    "label": "{{__('site.places')}}",
                                                                                    "value": "{{$places}}"
                                                                                }, {
                                                                                    "label": "{{__('site.aqars')}}",
                                                                                    "value": "{{$aqars}}"
                                                                                }, {
                                                                                    "label": "{{__('site.users')}}",
                                                                                    "value": "{{$users}}"
                                                                                }]
                                                                            },
                                                                        };
                                                                    let fusioncharts = new FusionCharts(chartConfigs).render('vc-chart');
                                                                    /*======> Responsive BreakPoints <========*/
                                                                    responsiveChart(fusioncharts ,{
                                                                        small:"360",
                                                                        medium:"470",
                                                                        large:"480",
                                                                        xLarge:"510"
                                                                    });
                                                                });
                                                            </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row m-0 chart-main">
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                        <div class="hospital-small-chart">
                                            <div class="small-bar">
                                                <div class="small-chart flot-chart-container"></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="right-chart-content">
                                                <h4>{{$cars}}</h4><span>@lang('site.cars') @endlang </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                        <div class="hospital-small-chart">
                                            <div class="small-bar">
                                                <div class="small-chart1 flot-chart-container"></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="right-chart-content">
                                                <h4>{{$places}}</h4><span>@lang('site.places')</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                        <div class="hospital-small-chart">
                                            <div class="small-bar">
                                                <div class="small-chart2 flot-chart-container"></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="right-chart-content">
                                                <h4>{{$aqars}}</h4><span>@lang('site.aqars') </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media border-none align-items-center">
                                        <div class="hospital-small-chart">
                                            <div class="small-bar">
                                                <div class="small-chart3 flot-chart-container"></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="right-chart-content">
                                                <h4>{{$users}}</h4><span>@lang('site.users') </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body right-chart-content">
                                    <h4>{{$notifications}}<span class="new-box"></span></h4><span>@lang('site.notifications')</span>
                                </div>
                                <div class="knob-block text-center">
                                    <input class="knob1" data-width="10" data-height="70" data-thickness=".3" data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb" value="10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 xl-50 chart_data_right second d-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body right-chart-content">
                                    <h4>$95,000<span class="new-box">New</span></h4><span>Product Order Value</span>
                                </div>
                                <div class="knob-block text-center">
                                    <input class="knob1" data-width="50" data-height="70" data-thickness=".3" data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6  col-lg-12 xl-50 appointment box-col-6">
                    <div id="support-chart" class="card gradient-primary o-hidden"></div>
                        <script>
                            window.addEventListener('load', () => {
                                /*======> Config Chart <========*/
                                let chartConfigs = {
                                        type: "doughnut2d",
                                        renderAt: 'chart-container',
                                        width: "100%",
                                        height: "600",
                                        //=====> Data Set via json File <=====//
                                        dataFormat: "json",
                                        dataSource: 
                                        {
                                            "chart": {
                                                "caption": "{{__('site.Main Statistics')}}",
                                                "subCaption": "",
                                                "numberPrefix": "",
                                                "defaultCenterLabel": "{{__('Total Statistics')}}: {{$cars+$places+$aqars}} ",
                                                "centerLabel": "Revenue from $label: $value",
                                                "paletteColors": "#60CE76,#4831d4,#2E3E5F,#ea2087,#ac4e444e,#F9C832",
                                                "decimals": "0",
                                                "theme": "fusion"
                                            },
                                            "data": [
                                                {
                                                    "label": "{{__('site.cars')}}",
                                                    "value": "{{$cars}}"
                                                }, {
                                                    "label": "{{__('site.places')}}",
                                                    "value": "{{$places}}"
                                                }, {
                                                    "label": "{{__('site.aqars')}}",
                                                    "value": "{{$aqars}}"
                                                }, {
                                                    "label": "{{__('site.users')}}",
                                                    "value": "{{$users}}"
                                                }
                                            ]
                                        },
                                    };
                                let fusioncharts = new FusionCharts(chartConfigs).render('support-chart');
                            });
                        </script>     
                </div>
                <div class="col-xl-6 col-lg-12 xl-50 calendar-sec box-col-6">
                    <div class="card gradient-primary o-hidden custom-height">
                        <div class="card-body">
                            <div class="setting-dot">
                                <div class="setting-bg-primary date-picker-setting pull-right">
                                    <div class="icon-box"><i data-feather="more-horizontal"></i></div>
                                </div>
                            </div>
                            <div class="default-datepicker">
                                <div class="datepicker-here" data-language="en"></div>
                            </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>



    <div id="vc-chart" class="mb15"></div>
           
            
        </div> 
            

@endsection
@section('scripts')
<script type="text/javascript" src="{{MAINASSETS}}/js/fusioncharts.js"></script>
<script type="text/javascript" src="{{MAINASSETS}}/js/fusioncharts.theme.fusion.js"></script>
<script>
// greeting
var today = new Date()
var curHr = today.getHours()

if (curHr >= 0 && curHr < 4) {
    document.getElementById("greeting").innerHTML = "@lang('site.Good Afternoon')";
} else if (curHr >= 4 && curHr < 12) {
    document.getElementById("greeting").innerHTML = "@lang('site.Good Morning')";
} else if (curHr >= 12 && curHr < 16) {
    document.getElementById("greeting").innerHTML = "@lang('site.Good Afternoon')";
} else {
    document.getElementById("greeting").innerHTML = "@lang('site.Good Afternoon')";
}
</script>

@endsection