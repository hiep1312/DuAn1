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
$dataFull = $connect->getAlltotalsOrders();
$dataCurentm = $connect->getAllCurrentMonth();
$dataCurenty = $connect->getAllCurrentYear();
$chartSp = $connect->chartdanhmucSp();
$chartCm = $connect->countLikes();
if($allData){
    $labels = [];
    $dataDay = [];
    $backgroundColor = [
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
    $data = [
        'labels' => $labels,
        'datasets' => [[
            'data' => $dataDay,
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
            'label' => 'Tổng doanh thu theo ngày',
            'hoverOffset' => 4,
            'borderAlign' => "center",
            'spanGaps' => true
        ]]
    ];
    $options = ['responsive' => false,
                'scales' => [
            'y'=> [
                'beginAtZero'=> true
              ]
                ]
        ];
    $attributes = ['id' => 'name', 'width' => 500, 'height' => 300];
    $doughnut  = new ChartJS('bar', $data, $options, $attributes);
}
if($MonthData) {
    $labels1 = [];
    $dataMonth = [];
    $backgroundColor1 =$backgroundColor1 = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
    ];
    foreach ($MonthData as $month) {
        $labels1[] = $month->order_month;
        $dataMonth[] = $month->monthly_total;
    }
    $datam = [
        'labels' => $labels1,
        'datasets' => [[
            'data' => $dataMonth,
            'backgroundColor' => $backgroundColor1,
            'borderWidth' => 1,
            'label' => 'Tổng doanh thu theo tháng',
            'hoverOffset' => 4,
            'borderAlign' => "center",
        ]]
    ];
    $options = ['responsive' => false];
    $attributes = ['id' => 'month', 'width' => 500, 'height' => 300];
    $month  = new ChartJS('polarArea', $datam, $options, $attributes);
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
    $backgroundColor1 = $backgroundColor1 = ["blue", "red", "green", "yellow", "orange", "pink"];
    foreach ($chartCm as $chartcm) {
        $labelCm[] = $chartcm->content;
        $dataChart[] = $chartcm->likes;
    }
    $chartCM = [
    'labels'=> $labelCm,
      'datasets'=> [[
       'label'=> 'Bình luận được yêu thích nhất',
        'backgroundColor'=> $backgroundColor1,
        'borderColor'=> [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        'borderWidth'=> 1,
        'data'=> $dataChart,
      ]]
    ];
    $options = ['responsive' => false
        /*'scales' => [
        'x' => [
            'border' => [
                'color'=> 'blue'
                ]
                ]
            ]*/
        ];
    $attributes = ['id' => 'lo', 'width' => 500, 'height' => 300];
    $chartL  = new ChartJS('doughnut', $chartCM, $options, $attributes);
};

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
            <div class="col-xl-4 col-md-6 justify-content-center">
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
                        <span class="text-white d-block f-34 f-w-500 my-2"> <?php echo $totalSum; ?> <i class="ti ti-arrow-up-right-circle opacity-50"></i> </span>
                        <p class="mb-0 opacity-50">Tổng doanh thu của Nhaccuviet</p>
                    </div>
                </div>
                <div class=" text-align-center text-xl-center">
                    <h2>Tổng doanh thu theo ngày</h2>
                    <?php
                    echo $doughnut;
                    ?>
                </div>
                <div class="my-5 text-align-center text-xl-center">
                    <h2>Sản phẩm theo thương hiệu</h2>
                    <?php
                    echo $sp;
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
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
                                        <span class="text-white d-block f-34 f-w-500 my-2"><?= $totalSumM ?><i class="ti ti-arrow-down-right-circle opacity-50"></i></span>
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
                                        <span class="text-white d-block f-34 f-w-500 my-2"> <?= $totalSumY ?> <i class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">Doanh thu theo năm hiện tại</p>
                                    </div>
                                    <div class="col-4">
                                        <div id="tab-chart-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="justify-content-center align-content-center align-items-center text-xl-center mx-2 my-4">
                   <h2>Tổng doanh thu theo tháng</h2>
                   <?php
                   echo $month;
                   ?>
               </div>
                <div class="justify-content-center align-content-center align-items-center text-xl-center mx-2 mt-5">
                   <h2>Bình luận được yêu thích</h2>
                   <?php
                   echo $chartL;
                   ?>
               </div>
            </div>
            <!--<div class="col-xl-4 col-md-12">
                <div class="card bg-primary-dark dashnum-card dashnum-card-small text-white overflow-hidden">
                    <span class="round bg-primary small"></span>
                    <span class="round bg-primary big"></span>
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avtar avtar-lg">
                                <i class="text-white ti ti-credit-card"></i>
                            </div>
                            <div class="ms-2">
                                <h4 class="text-white mb-1">$203k <i class="ti ti-arrow-up-right-circle opacity-50"></i></h4>
                                <p class="mb-0 opacity-50 text-sm">Net Profit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card dashnum-card dashnum-card-small overflow-hidden">
                    <span class="round bg-warning small"></span>
                    <span class="round bg-warning big"></span>
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="avtar avtar-lg bg-light-warning">
                                <i class="text-warning ti ti-credit-card"></i>
                            </div>
                            <div class="ms-2">
                                <h4 class="mb-1">$550K <i class="ti ti-arrow-up-right-circle opacity-50"></i></h4>
                                <p class="mb-0 opacity-50 text-sm">Total Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div class="col-xl-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col">
                                <small>Total Growth</small>
                                <h3>$2,324.00</h3>
                            </div>
                            <div class="col-auto">
                                <select class="form-select p-r-35">
                                    <option>Today</option>
                                    <option selected>This Month</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="growthchart"></div>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col">
                                <h4>Popular Stocks</h4>
                            </div>
                            <div class="col-auto"> </div>
                        </div>
                        <div class="rounded bg-light-secondary overflow-hidden mb-3">
                            <div class="px-3 pt-3">
                                <div class="row mb-1 align-items-start">
                                    <div class="col">
                                        <h5 class="text-secondary mb-0">Bajaj Finery</h5>
                                        <small class="text-muted">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0">$1839.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div id="bajajchart"></div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="mb-0">Bajaj Finery</h5>
                                        <small class="text-success">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0">$1839.00<span class="ms-2 align-top avtar avtar-xxs bg-light-success"
                                        ><i class="ti ti-chevron-up text-success"></i></span
                                        ></h4>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="mb-0">TTML</h5>
                                        <small class="text-danger">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0"
                                        >$100.00<span class="ms-2 align-top avtar avtar-xxs bg-light-danger"
                                            ><i class="ti ti-chevron-down text-danger"></i></span
                                            ></h4>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="mb-0">Reliance</h5>
                                        <small class="text-success">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0"
                                        >$200.00<span class="ms-2 align-top avtar avtar-xxs bg-light-success"
                                            ><i class="ti ti-chevron-up text-success"></i></span
                                            ></h4>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="mb-0">TTML</h5>
                                        <small class="text-danger">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0"
                                        >$189.00<span class="ms-2 align-top avtar avtar-xxs bg-light-danger"
                                            ><i class="ti ti-chevron-down text-danger"></i></span
                                            ></h4>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="mb-0">Stolon</h5>
                                        <small class="text-danger">10% Profit</small>
                                    </div>
                                    <div class="col-auto">
                                        <h4 class="mb-0"
                                        >$189.00<span class="ms-2 align-top avtar avtar-xxs bg-light-danger"
                                            ><i class="ti ti-chevron-down text-danger"></i></span
                                            ></h4>
                                    </div>
                                </div>
                            </li>
                        </ul><div class="text-center">
                            <a href="#" class="b-b-primary text-primary">View all <i class="ti ti-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>-->
<!--             [ sample-page ] end-->
        </div>
<!--         [ Main Content ] end -->
    </div>
</div>
<?php
include_once $BASE_URL . "View/Admin/components/footer-block.php";
include_once $BASE_URL . "View/Admin/components/footer-js.php";
?>
<!--<script src="--><?php //= $BASE_URL ?><!--View/Admin/assets/js/plugins/apexcharts.min.js"></script>-->
<!--<script src="--><?php //= $BASE_URL ?><!--View/Admin/assets/js/pages/dashboard-default.js"></script>-->
<script src="<?= $BASE_URL ?>View/Admin/chart/js/Chart.min.js"></script>
<script src="<?= $BASE_URL ?>View/Admin/chart/js/driver.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>