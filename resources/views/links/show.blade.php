@extends('layouts.app')

@section('title', 'Thống kê - ' . str_replace(['http://', 'https://'], '', url($link->short_code)) . ' · LinkSnap')

@section('content')
<div class="min-h-screen pt-6 sm:pt-8 pb-24">
    <div class="max-w-7xl mx-auto px-3 sm:px-6">

        {{-- Header Section --}}
        @include('links.partials.header')

        {{-- Metric Overview Cards --}}
        @include('links.partials.metrics-cards')

        {{-- Main Analytics Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            {{-- Left Column (2/3): Primary Analytics & Visualizations --}}
            <div class="lg:col-span-2 space-y-6">
                @include('links.partials.chart-card')
                @include('links.partials.breakdown-card')
            </div>

            {{-- Right Column (1/3): Security Settings & Live Activity Stream --}}
            <div class="lg:col-span-1 space-y-6">
                @include('links.partials.advanced-card')
                @include('links.partials.recent-logs')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/link-details.js') }}" defer></script>
<script id="dailyClicksData" type="application/json">@json($dailyClicks)</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dataEl = document.getElementById('dailyClicksData');
    const dailyClicks = dataEl ? JSON.parse(dataEl.textContent || '[]') : [];
    if (window.initLinkChart) {
        initLinkChart(dailyClicks);
    }
});
</script>
@endpush
