@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Dashboard
@endsection

@section('breadcrumb-title')
    Dashboard
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="target" class="report-box__icon text-primary"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $total_goals ?? 0 }}</div>
                    <div class="text-base text-slate-500 mt-1">Goals</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="users" class="report-box__icon text-pending"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $total_clients_and_partners ?? 0 }}</div>
                    <div class="text-base text-slate-500 mt-1">Our Clients And Partners</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="mail" class="report-box__icon text-warning"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $total_enquiries ?? 0 }}</div>
                    <div class="text-base text-slate-500 mt-1">Enquiries</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="file-text" class="report-box__icon text-success"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $total_portfolios ?? 0 }}</div>
                    <div class="text-base text-slate-500 mt-1">Portfolios</div>
                </div>
            </div>
        </div>
    </div>
@endsection
