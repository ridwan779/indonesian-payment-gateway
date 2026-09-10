@extends('layout.index')
@section('content')
<div id="view-checkout" class="view-section active">
    <div class="checkout-wrapper">
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="summary-item">
                <span class="text-muted">Product</span>
                <span>Pro License API <span class="badge">PoC</span></span>
            </div>
            <div class="summary-item">
                <span class="text-muted">Environment</span>
                <span>Sandbox / Testing</span>
            </div>
            <div class="summary-item total">
                <span>Total Payment</span>
                <span>Rp 150.000</span>
            </div>
        </div>

        <div class="payment-form-section">
            <h1>Payment Details</h1>
            <p class="subtitle">Complete your payment to process the transaction.</p>

            <form id="pocPaymentForm" method="POST" action="{{ route('home.payment.process') }}">
                @csrf
                <input type="hidden" name="price" value="150000">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" id="customer_name" name="name" class="form-control" placeholder="John Doe">
                    @error('name')
                    <div class="error-msg" id="err-name">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="text" id="customer_phone" name="phone" class="form-control" placeholder="082xxxxxx">
                    @error('phone')
                    <div class="error-msg" id="err-phone">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Payment Channel</label>
                    <select id="payment_method" name="payment" class="form-control">
                        <option value="" disabled selected>-- Select Payment Method --</option>
                        @foreach ($payment_channels as $channel)
                        <option value="{{ $channel->id }}">
                            {{ $channel->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('payment')
                    <div class="error-msg" id="err-payment">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" id="btnSubmit">
                    <div class="spinner" id="btnSpinner"></div>
                    <span id="btnText">Pay Rp 150.000</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.addEventListener('load', function () {
        $('input[name=phone]').on('keyup', function() {
            this.value = this.value.replace(/\D/g, '');
        })
    });
</script>
@endpush
