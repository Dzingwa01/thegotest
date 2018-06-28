@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid">
        <h5 class="text-center text-capitalize" style="margin-top:2em;">Complete business registration below</h5>
    <form>
        {{--<fieldset><legend>Bussiness Registration Details</legend>--}}
            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" class="form-control" id="business_name" placeholder="Enter business name">
            </div>

            <div class="form-group">
                <label for="business_type">Business Type</label>
                <select id="business_type" name="business_type" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Person</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter contact person">
            </div>
        <div class="form-group">
            <label for="business_email">Email address</label>
            <input type="email" class="form-control" id="business_email" name="business_email" aria-describedby="emailHelp" placeholder="Enter business email address">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="business_contact_number">Contact Number</label>
            <input type="tel" class="form-control" name="business_contact_number" id="business_contact_number" placeholder="Contact Number">
        </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Business Address</label>
                <textarea type="text" class="form-control" name="business_address" id="contact_number" placeholder="Business address" rows="5"></textarea>
            </div>

        <button type="submit" class="btn btn-success">Submit</button>
        {{--</fieldset>--}}
    </form>


    {{--<div id="c">--}}
        {{--<div class="container">--}}
            {{--<p>--}}
                {{--Powered by The Go--}}
            {{--</p>--}}

        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@push('custom-scripts')
{{--<script src="{{ asset('/js/app.js') }}"></script>--}}
{{--<script src="{{ asset('/js/smoothscroll.js') }}"></script>--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').select2({placeholder:"Select business type"});
        $('.carousel').carousel({
            interval: 3500
        })
    });

</script>

@endpush
