@extends('layouts.app')

@section('title', 'Thống kê - ' . str_replace(['http://', 'https://'], '', url($link->short_code)) . ' · LinkSnap')

@section('content')
<main class="min-h-screen bg-slate-50/50 pt-8 pb-32">
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        {{-- Header Section --}}
        @include('links.partials.header')

        {{-- Metric Overview Cards --}}
        @include('links.partials.metrics-cards')

        {{-- Main Analytics Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: URL info, Advanced settings, Chart, OS/Browser Distribution --}}
            <div class="lg:col-span-2 space-y-8">
                @include('links.partials.info-card')
                @include('links.partials.advanced-card')
                @include('links.partials.chart-card')
                @include('links.partials.breakdown-card')
            </div>

            {{-- Right Column: Recent Activity Logs --}}
            @include('links.partials.recent-logs')
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="{{ asset('js/link-details.js') }}" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dailyClicks = @json($dailyClicks);
    if (window.initLinkChart) {
        initLinkChart(dailyClicks);
    }
});
</script>
@endpush
