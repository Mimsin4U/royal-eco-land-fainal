@php
        $parcel=DB::table('parcels')->where('m_id',session('merchantId'))->get();
        $parcelPending=DB::table('parcels')->where('status','Pending')->where('m_id',session('merchantId'))->get();
        $parcelPicked=DB::table('parcels')->where('status','PickedUp')->where('m_id',session('merchantId'))->get();
        $inTransit=DB::table('parcels')->where('status','inTransit')->where('m_id',session('merchantId'))->get();
        $assignToDelivery=DB::table('parcels')->where('status','Assign to delivery')->where('m_id',session('merchantId'))->get();
        $delivered=DB::table('parcels')->where('status','delivered')->where('m_id',session('merchantId'))->get();
        $hold=DB::table('parcels')->where('status','hold')->where('m_id',session('merchantId'))->get();
        $returnToPending=DB::table('parcels')->where('status','returnToPending')->where('m_id',session('merchantId'))->get();
        $returnToHub=DB::table('parcels')->where('status','returnToHub')->where('m_id',session('merchantId'))->get();
        $returnToMerchant=DB::table('parcels')->where('status','returnToMerchant')->where('m_id',session('merchantId'))->get();
        $PaymentComplete=DB::table('parcels')->where('status','PaymentComplete')->where('m_id',session('merchantId'))->get();
        $cancelled=DB::table('parcels')->where('status','cancelled')->where('m_id',session('merchantId'))->get();
        $merchant_pass=DB::table('merchants')->where('id',session('merchantId'))->get();
@endphp
<div class="col-lg-3 wow animate__animated animate__fadeInLeftBig" data-wow-duration="1s">
    <div class="blog-sidebar">
        <div class="blog-search">
            <form>
                <input type="text" placeholder="Search here">
                <button type="submit">
                    <i class="icofont-search-2"></i>
                </button>
            </form>
        </div>
        <div class="blog-widget">
            {{--                            <h3>Contact Us</h3>--}}
            <ul>
                <li>
                    <a href="{{ route('merchant-profile') }}"><i class="icofont-home"></i> Home</a>
                </li>
                <li>
                    <a href="{{ route('parcel') }}"><i class="icofont-home"></i> Create Parcel</a>
                </li>
                <li>
                    <a href="{{ route('all-parcel') }}"><i class="icofont-home"></i> All Parcel ({{ count($parcel) }})</a>
                </li>
                <li>
                    <a href="{{ route('pending-parcel') }}"><i class="icofont-home"></i>  Parcel Pending  ({{count($parcelPending) }}) </a>
                </li>
                <li>
                    <a href="{{ route('picked-parcel') }}"><i class="icofont-home"></i>  Parcel Picked ({{count($parcelPicked) }})</a>
                </li>
                <li>
                    <a href="{{route('in-transit')}}"><i class="icofont-home"></i>  In Transit ({{count($inTransit) }})</a>
                </li>
                <li>
                    <a href="{{route('assign-to-delivery')}}"><i class="icofont-home"></i>  Assign to Delivery ({{count($assignToDelivery) }})</a>
                </li>
                <li>
                    <a href="{{ route('delivered-parcel') }}"><i class="icofont-home"></i>  Delivered Parcel ({{ count($delivered) }})</a>
                </li>
                <li>
                    <a href="{{ route('hold-parcel') }}"><i class="icofont-home"></i>  Hold  ({{ count($hold) }})</a>
                </li>
                <li>
                    <a href="{{ route('return-to-pending') }}"><i class="icofont-home"></i>  Return To Pending ({{ count($returnToPending) }})</a>
                </li>
                <li>
                    <a href="{{ route('return-to-hub') }}"><i class="icofont-home"></i>  Return To Hub ({{ count($returnToHub) }})</a>
                </li>
                <li>
                    <a href="#"><i class="icofont-home"></i>  Return To Merchant ({{ count($returnToMerchant) }})</a>
                </li>
                <li>
                    <a href="{{ route('payment-complete') }}"><i class="icofont-home"></i>  payment Complete ({{ count($PaymentComplete) }})</a>
                </li>
                <li>
                    <a href="{{ route('cancelled') }}"><i class="icofont-home"></i>  Cancelled ({{ count($cancelled) }})</a>
                </li>
{{--       ============ shima 20221031 start =============--}}
                @foreach($merchant_pass as $merchant_pass)

                    @if($merchant_pass->passReq=='accept')

                    <li>
                         <a href="{{ route('change-pass') }}"><i class="icofont-key"></i> Change Password</a>
                    </li>
                    @endif
                @endforeach
{{--                @endif--}}
{{--       ============ shima 20221031 end =============--}}

                {{--                <li>--}}
{{--                    <a href="#"><i class="icofont-home"></i>  Collected Amount From DA</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
