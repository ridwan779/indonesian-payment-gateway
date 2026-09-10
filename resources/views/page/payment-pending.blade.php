@extends('layout.index')
@section('content')
<div class="view-section">
    <div class="status-wrapper">
        <div class="status-card">
            <div class="icon-circle icon-pending">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1>Awaiting Payment</h1>
            <p class="subtitle">Please complete your payment before the timer expires.</p>
            
            <div class="countdown" id="timer">23:59:59</div>

            <div class="details-box">
                <div class="detail-row">
                    <span class="detail-label">Payment Method</span>
                    <span class="detail-value" id="display-method">BCA Virtual Account</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Amount</span>
                    <span class="detail-value text-primary" style="color: var(--primary);">Rp 150.000</span>
                </div>
                
                <div class="copy-wrapper">
                    <div>
                        <div class="detail-label" style="margin-bottom: 4px;">Virtual Account Number</div>
                        <div class="va-number" id="va-number">8077 0987 6543 210</div>
                    </div>
                </div>
            </div>

            <a href="{{ route('home.index') }}" class="btn btn-outline">Change Payment Method</a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    window.addEventListener('load', function () {
        let timeInSeconds = 60 * 30;
        function updateTimer() {
            const hours = Math.floor(timeInSeconds / 3600);
            const minutes = Math.floor((timeInSeconds % 3600) / 60);
            const seconds = timeInSeconds % 60;
            const text =  
                String(hours).padStart(2, '0') + ':' + 
                String(minutes).padStart(2, '0') + ':' + 
                String(seconds).padStart(2, '0');

            $('#timer').html(text)
            if (timeInSeconds > 0) {
                timeInSeconds--;
            }

        }
        setInterval(updateTimer, 1000);
        updateTimer();
    });
</script>
@endpush
