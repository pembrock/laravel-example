@extends('layout.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        <h2>Section title</h2>
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> Donut Chart Example </h3>
                    </div>
                    <section class="example">
                        <div id="morris-donut-chart"><svg height="342" version="1.1" width="742" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#9ed85f" d="M370.75,284.1666666666667A109.66666666666667,109.66666666666667,0,0,0,474.2973343198169,210.62100957943784" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#9ed85f" stroke="#ffffff" d="M370.75,287.1666666666667A112.66666666666667,112.66666666666667,0,0,0,477.12993617051103,211.6091223034954L521.3499983952353,227.03465982906081A159.5,159.5,0,0,1,370.75,334Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#6ba829" d="M474.2973343198169,210.62100957943784A109.66666666666667,109.66666666666667,0,0,0,272.37221799299,126.03774886410046" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#6ba829" stroke="#ffffff" d="M477.12993617051103,211.6091223034954A112.66666666666667,112.66666666666667,0,0,0,269.6810324669624,124.71203378743452L227.66863619953105,104.01614842392728A159.5,159.5,0,0,1,521.3499983952353,227.03465982906081Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#85ce36" d="M272.37221799299,126.03774886410046A109.66666666666667,109.66666666666667,0,0,0,370.7155472011324,284.1666612548336" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#85ce36" stroke="#ffffff" d="M269.6810324669624,124.71203378743452A112.66666666666667,112.66666666666667,0,0,0,370.7146047233518,287.16666110678955L370.69832080169857,338.99999188225047A164.5,164.5,0,0,1,223.18332698948498,101.8066232961507Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="370.75" y="164.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.4585,0,0,1.4585,-169.9848,-80.4682)" stroke-width="0.6856319655521783"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="6">Mail-Order Sales</tspan></text><text x="370.75" y="184.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.2847,0,0,2.2847,-476.4312,-226.7535)" stroke-width="0.4376899696048632"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5">20</tspan></text></svg></div>
                    </section>
                </div>
            </div>
    </main>
@stop