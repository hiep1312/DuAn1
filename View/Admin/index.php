<?php
require_once "./Model/Dashboard.php";
require_once "./View/Admin/chart/src/ChartJS.php";
//$dashboard = new Model\Dashboard(); // Khởi tạo đối tượng Dashboard
$BASE_URL = "./"
?>
<?php
$connect = new Dashboard();
$allData = $connect->getdaylyOrders();
$MonthData = $connect->getMonthOrders();
$YearData = $connect->getYearOrders();
$dataFull = $connect->getAlltotalsOrders();
$dataCurentm = $connect->getAllCurrentMonth();
$dataCurenty = $connect->getAllCurrentYear();
$chartSp = $connect->chartdanhmucSp();
$chartCm = $connect->countLikes();
$ctacts = $connect->layphoneContacts();
$promos = $connect->getPromotions();
$userDs = $connect->getDUsers();
$userMs = $connect->getMUsers();
$userYs = $connect->getYUsers();
if($ctacts){
    $labelct = [];
    $datact = [];
    $backgroundColor = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
    ];
    foreach ($ctacts as $ctact) {
        $labelct[] = $ctact->contact_count;
        $datact[] = $ctact->phone;
    }
    $datacts = [
        'labels' => $labelct,
        'datasets' => [[
            'data' => $datact,
            'backgroundColor' => $backgroundColor,
            'borderWidth' => 1,
            'borderColor' => [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            'label' => 'Liên hệ nhiều nhất',
            'hoverOffset' => 4,
            'hoverBackgroundColor' => 'rgb(255, 99, 132)',
            'borderAlign' => "center",
            'spanGaps' => true
        ]]
    ];
    $options = ['responsive' => false,
                /*'scales' => [
            'y'=> [
                'beginAtZero'=> true
              ]
                ]*/
        'animations'=> [
    'tension' => [
        'duration'=> 1000,
        'easing'=> 'linear',
        'from'=> 1,
        'to'=> 0,
        'loop'=> true
      ],
        ],
        ];
    $attributes = ['id' => 'contacts', 'width' => 500, 'height' => 300];
    $ctp  = new ChartJS('bar', $datacts, $options, $attributes);
}
if($MonthData) {
    $labels = [];
    $dataDay = [];
    $labels1 = [];
    $data1 = [];
    $labels2 = [];
    $data2 = [];
    $backgroundColor1 = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
    ];
    foreach ($allData as $day) {
        $labels[] = $day->order_date;
        $dataDay[] = $day->total;
    }
    foreach ($MonthData as $month) {
        $labels1[] = $month->order_month;
        $data1[] = $month->monthly_total;
    }
    foreach ($YearData as $year) {
        $labels2[] = $year->order_year;
        $data2[] = $year->yearly_total;
    }
    $datam = [
        'labels' => $labels1,
        'datasets' => [[
            'data' => $data1,
            'backgroundColor' => $backgroundColor1,
            'borderWidth' => 1,
            'fill' => true,
            'label' => 'Tổng doanh thu theo tháng',
            'hoverOffset' => 4,
            'borderAlign' => "center",
        ],
            [
                'labels' => $labels2,
                'data' => $data2,
                'backgroundColor' => $backgroundColor1,
                'borderWidth' => 1,
                'label' => 'Tổng doanh thu theo năm',
                'hoverOffset' => 4,
                'fill' => true,
                'borderAlign' => "center",
        ],
            [
                    'labels' => $labels,
                    'data' => $dataDay,
                    'backgroundColor' => $backgroundColor1,
                    'borderWidth' => 1,
                    'label' => 'Sản phẩm theo ngày',
                    'hoverBackgroundColor' => 'rgb(255, 99, 132)',
                    'borderAlign' => "center",
                    'fill' => true,
                    'spanGaps' => true,
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ]
                ],
                ]];
    $options = ['responsive' => false];
    $attributes = ['id' => 'month', 'width' => 500, 'height' => 300];
    $month  = new ChartJS('line', $datam, $options, $attributes);
};
if($userDs) {
    $labelus = [];
    $datauseDay = [];
    $labelus1 = [];
    $datauseMonth = [];
    $labelus2 = [];
    $datauseYear = [];
    $backgroundColor1 = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
    ];
    foreach ($userDs as $day) {
        $labelus[] = $day->user_count;
        $datauseDay[] = $day->registration_date;
    }
    foreach ($userMs as $userM) {
        $labelus1[] = $userM->registration_month;
        $datauseMonth[] = $userM->user_count;
    }
    foreach ($userYs as $year) {
        $labelus2[] = $year->registration_year;
        $datauseYear[] = $year->user_count;
    }
    $dataUser = [
        'labels' => $labelus1,
        'datasets' => [[
            'data' => $datauseMonth,
            'backgroundColor' => $backgroundColor1,
            'borderWidth' => 1,
            'fill' => true,
            'label' => 'Lưu lượng truy cập theo tháng',
            'hoverOffset' => 4,
            'borderAlign' => "center",
            'pointBackgroundColor'=> 'rgb(255, 99, 132)',
            'pointBorderColor' => '#fff',
            'pointHoverBackgroundColor'=> '#fff',
            'pointHoverBorderColor'=> 'rgb(255, 99, 132)'
        ],
            [
                'labels' => $labelus2,
                'data' => $datauseYear,
                'backgroundColor' => $backgroundColor1,
                'borderWidth' => 1,
                'label' => 'Lưu lượng truy cập theo năm',
                'hoverOffset' => 4,
                'fill' => true,
                'borderAlign' => "center",
                'pointBackgroundColor'=> 'rgb(255, 99, 132)',
                'pointBorderColor' => '#fff',
                'pointHoverBackgroundColor'=> '#fff',
                'pointHoverBorderColor'=> 'rgb(255, 99, 132)'
        ],
            [
                    'labels' => $labelus,
                    'data' => $datauseDay,
                    'backgroundColor' => $backgroundColor1,
                    'borderWidth' => 1,
                    'label' => 'Lưu lượng truy cập theo ngày',
                    'hoverBackgroundColor' => 'rgb(255, 99, 132)',
                    'borderAlign' => "center",
                    'fill' => true,
                    'pointBackgroundColor'=> 'rgba(255, 99, 132, 0.2)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor'=> '#fff',
                    'pointHoverBorderColor'=> 'rgb(255, 99, 132)',
                    'spanGaps' => true,
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ]
                ],
                ]];
    $options = ['responsive' => false];
    $attributes = ['id' => 'user', 'width' => 500, 'height' => 400];
    $user  = new ChartJS('radar', $dataUser, $options, $attributes);
};
if($chartSp) {
    $labelchart = [];
    $dataChart = [];
    $backgroundColor1 = ["blue", "red", "green", "yellow", "orange", "pink"];
    foreach ($chartSp as $chartsp) {
        $labelchart[] = $chartsp->product_brand;
        $dataChart[] = $chartsp->Tongptonkho;
    }
    $chartSP = [
    'labels'=> $labelchart,
      'datasets'=> [[
       'label'=> 'Sản phẩm theo thương hiệu',
        'backgroundColor'=> 'rgba(54, 162, 235, 0.5)',
        'borderColor'=> 'rgb(54, 162, 235)',
        'borderWidth'=> 1,
          'fill' => true,
        'data'=> $dataChart,
      ]]
    ];
    $options = ['responsive' => false,
        'scales' => [
        'x' => [
            'border' => [
                'color'=> 'red'
                ]
                ]
            ]
        ];
    $attributes = ['id' => 'li', 'width' => 500, 'height' => 300];
    $sp  = new ChartJS('line', $chartSP, $options, $attributes);
};
if($chartCm) {
    $labelCm = [];
    $dataChart = [];
    $backgroundColor1 = 'rgb(75, 192, 192)';
    foreach ($chartCm as $chartcm) {
        $labelCm[] = $chartcm->content;
        $dataChart[] = $chartcm->likes;
    }
    $chartCM = [
    'labels'=> $labelCm,
      'datasets'=> [[
       'label'=> 'Bình luận được yêu thích nhất',
        'backgroundColor'=> $backgroundColor1,
        'borderColor'=> 'rgb(75, 192, 192)',
          'fill' => true,
        'borderWidth'=> 1,
        'data'=> $dataChart,
//        'hoverBackgroundColor' => 'rgb(255, 99, 132)',
      ]]
    ];
    $options = ['responsive' => false,
        'scales' => [
        'x' => [
            'border' => [
                'color'=> 'blue'
                ]
                ]
            ]
        ];
    $attributes = ['id' => 'lo', 'width' => 500, 'height' => 300];
    $chartL  = new ChartJS('line', $chartCM, $options, $attributes);
}
if($promos) {
    $labelpro = [];
    $datapro = [];
    $backgroundColor1 = 'rgb(75, 192, 192)';
    foreach ($promos as $promo) {
        $labelpro[] = $promo->code;
        $datapro[] = $promo->usage_limit;
    }
    $chartPR = [
    'labels'=> $labelpro,
      'datasets'=> [[
       'label'=> 'Giới hạn khuyến mãi',
        'backgroundColor'=> [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)'
        ],
        'borderColor'=> 'rgb(75, 192, 192)',
          'fill' => true,
        'borderWidth'=> 1,
        'data'=> $datapro,
        'hoverBackgroundColor' => 'rgb(255, 99, 132)',
      ]]
    ];
    $options = ['responsive' => false,
        /*'scales' => [
        'x' => [
            'border' => [
                'color'=> 'red'
                ]
                ]
            ]*/
        ];
    $attributes = ['id' => 'Pro', 'width' => 500, 'height' => 400];
    $chartPRs  = new ChartJS('polarArea', $chartPR, $options, $attributes);
}

if($dataFull){
    $sum = [];
    foreach ($dataFull as $sumTotal) {
        $sum[] = $sumTotal->totals;
    }
    $totalSum = array_sum($sum);
};
if ($dataCurentm) {
    $sumMonth = [];
    foreach ($dataCurentm as $sumM) {
        $sumMonth[] = $sumM->total;
    }
    $totalSumM = array_sum($sumMonth);
};
if ($dataCurenty) {
    $sumYear = [];
    foreach ($dataCurenty as $sumY) {
        $sumYear[] = $sumY->total;
    }
    $totalSumY = array_sum($sumYear);
};


/*$datas = [
    'labels'=> 'labels',
  'datasets' => [[
    'label' => 'My Second Dataset',
    'data' => [65, 59, 80, 81, 56, 55, 40],
    'fill' => false,
    'borderColor' => 'rgb(75, 192, 192)',
    'tension' => 0.1
  ]]
];
$option = ['responsive' => false];
$attribute = ['id' => 'ok', 'width' => 500, 'height' => 500];
$point  = new ChartJS('line', $datas, $option, $attribute);*/
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    //Link
    include $BASE_URL . "View/Admin/components/head-page-meta.php";
    //CSS
    include $BASE_URL . "View/Admin/components/head-css.php"
    ?>
</head>
<body>
<?php //Navbar
include $BASE_URL . "View/Admin/components/layout-vertical.php";
?>
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-12 col-md-6 justify-content-center">
                <div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-credit-card"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group">
                                    <a
                                            href="#"
                                            class="avtar bg-secondary dropdown-toggle arrow-none"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                    >
                                        <i class="ti ti-dots"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="text-white d-block f-34 f-w-500 my-2" > <span class="money"><?= $totalSum ?></span> <i class="ti ti-arrow-up-right-circle opacity-50"></i> </span>
                        <p class="mb-0 opacity-50">Tổng doanh thu của Nhaccuviet</p>
                    </div>
                </div>
                <div class="row justify-content-around text-xl-center gap-3">
                    <h2 class="my-4">Liên hệ nhiều nhất</h2>
                    <?php
                    echo $ctp;
                    ?>
                    <h2 class="my-4">Giới hạn khuyến mãi</h2>
                    <?php
                    echo $chartPRs;
                    ?>
                    <h2 class="my-4">Sản phẩm theo thương hiệu</h2>
                    <?php
                    echo $sp;
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-credit-card"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button
                                                class="nav-link text-white active"
                                                id="chart-tab-home-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#chart-tab-home"
                                                role="tab"
                                                aria-controls="chart-tab-home">Month</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button
                                                class="nav-link text-white"
                                                id="chart-tab-profile-tab"
                                                data-bs-toggle="pill"
                                                data-bs-target="#chart-tab-profile"
                                                role="tab"
                                                aria-controls="chart-tab-profile"
                                                aria-selected="false"
                                        >Year</button
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="chart-tab-tabContent">
                            <div class="tab-pane show active" id="chart-tab-home" role="tabpanel" aria-labelledby="chart-tab-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-8">
                                        <span class="text-white d-block f-34 f-w-500 my-2 "><span class="money"><?= $totalSumM ?></span><i class="ti ti-arrow-down-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">Doanh thu theo tháng hiện tại</p>
                                    </div>
                                    <div class="col-4">
                                        <div id="tab-chart-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="chart-tab-profile" role="tabpanel" aria-labelledby="chart-tab-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-8">
                                        <span class="text-white d-block f-34 f-w-500 my-2"> <span class="money"><?= $totalSumY ?></span> <i class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50 ">Doanh thu theo năm hiện tại</p>
                                    </div>
                                    <div class="col-4">
                                        <div id="tab-chart-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row justify-content-around text-xl-center gap-3">
                       <h2 class="my-4">Tổng doanh thu theo đơn hàng</h2>
                       <?php
                       echo $month;
                       ?>
                       <h2 class="my-4">Bình luận được yêu thích</h2>
                       <?php
                       echo $chartL;
                       ?>
                        <h2 class="my-4">Lưu lượng người dùng</h2>
                       <?php
                       echo $user;
                       ?>
               </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.querySelectorAll('.money').forEach(item=>item.textContent = parseInt(item.textContent).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'}))
</script>
<?php
include_once $BASE_URL . "View/Admin/components/footer-block.php";
include_once $BASE_URL . "View/Admin/components/footer-js.php";
?>
<!--<script src="--><?php //= $BASE_URL ?><!--View/Admin/assets/js/plugins/apexcharts.min.js"></script>-->
<!--<script src="--><?php //= $BASE_URL ?><!--View/Admin/assets/js/pages/dashboard-default.js"></script>-->
<script src="<?= $BASE_URL ?>View/Admin/chart/js/Chart.min.js"></script>
<!--chuyển động động mới >>>-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= $BASE_URL ?>View/Admin/chart/js/driver.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>