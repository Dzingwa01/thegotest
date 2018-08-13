@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="container" style="margin-top:3em;">
        <div id="normal_tracker" class="row">
            <div id="normal_tracker" class="step-container" style="width: 300px; margin: 0 auto"></div>
        </div>
        <h6 class="text-center text-capitalize" style="margin-top:0.5em;">Complete the template below</h6>

    </div>
<style>

</style>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.step-container').stepMaker({
                steps: ['Business Signup', 'Info Template', 'Complete Setup'],
                currentStep: 2
            });
        });
    </script>
@endsection


