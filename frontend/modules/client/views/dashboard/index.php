<?php
use backend\models\Expert;
use backend\models\BizCanvas;
use backend\models\ChatTopic;
use backend\models\ChatModel;
/* @var $this yii\web\View */

$this->title = 'Client Dashboard';
?>

<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Website Analytics</h3>
                    <div class="nk-block-des text-soft">
                        <p>Welcome to Analytics Dashboard.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="card-inner">
                            <div class="card-title-group align-start mb-0">
                                <div class="card-title">
                                    <h6 class="title">Total Biz Canvas</h6>
                                </div>
                                <div class="card-tools">
                                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Total Deposited" aria-label="Total Deposited"></em>
                                </div>
                            </div>
                            <div class="card-amount">
                                <span class="amount"> 1258
                                </span>
                                <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                            </div>
                            <div class="invest-data">
                                <div class="invest-data-amount g-2">
                                    <div class="invest-data-history">
                                        <div class="title">This Month</div>
                                        <div class="amount">320</div>
                                    </div>
                                    <div class="invest-data-history">
                                        <div class="title">This Week</div>
                                        <div class="amount">114</div>
                                    </div>
                                </div>
                                <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas class="iv-data-chart chartjs-render-monitor" id="totalDeposit" style="display: block; width: 107px; height: 68px;" width="214" height="136"></canvas>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="card-inner">
                            <div class="card-title-group align-start mb-0">
                                <div class="card-title">
                                    <h6 class="title">Total Biz Plan</h6>
                                </div>
                                <div class="card-tools">
                                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Total Withdraw" aria-label="Total Withdraw"></em>
                                </div>
                            </div>
                            <div class="card-amount">
                                <span class="amount"> 598
                                </span>
                                <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>
                            </div>
                            <div class="invest-data">
                                <div class="invest-data-amount g-2">
                                    <div class="invest-data-history">
                                        <div class="title">This Month</div>
                                        <div class="amount">258</div>
                                    </div>
                                    <div class="invest-data-history">
                                        <div class="title">This Week</div>
                                        <div class="amount">100</div>
                                    </div>
                                </div>
                                <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas class="iv-data-chart chartjs-render-monitor" id="totalWithdraw" width="214" height="136" style="display: block; width: 107px; height: 68px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <div class="card-head">
                                <h6 class="title">Total Sales By Months</h6>
                            </div>
                            <div class="nk-ck-sm"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas class="bar-chart chartjs-render-monitor" id="barChartMultiple" width="424" height="180" style="display: block; width: 424px; height: 180px;"></canvas>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <div class="card-head">
                                <h6 class="title">Total Registration By Months</h6>
                            </div>
                            <div class="nk-ck-sm"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas class="line-chart chartjs-render-monitor" id="filledLineChart" width="424" height="180" style="display: block; width: 424px; height: 180px;"></canvas>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                </div><!-- .col -->
            </div>
        </div><!-- .nk-block -->
    </div>
</div>
                    

