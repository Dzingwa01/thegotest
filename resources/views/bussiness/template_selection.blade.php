@extends('adminlte::layouts.user_layout')

@section('content')
    <div class="container" style="margin-top:3em;">
        <div id="normal_tracker" class="row">
            <div id="normal_tracker" class="step-container" style="width: 500px; margin: 0 auto"></div>
        </div>
        {{--{{$business}}--}}
        <h6 class="text-center text-capitalize" style="margin-top:0.5em;">Complete the template below</h6>
        <div class="row">
            <form id="business_info" class="col s12 card" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <meta name="_token" content="{{ csrf_token() }}">
                <div class="row">
                    <input id="business_id" value="{{$business->id}}" hidden>
                    <div class="input-field col m6 s12">
                        <label for="business_about_us">About Your Business</label>
                        <textarea type="text" class="materialize-textarea" class="validate" id="business_about_us" ></textarea>
                    </div>
                    <div class="input-field col m6 s12">
                        <label for="service_description">Service Description</label>
                        <textarea type="text" class="materialize-textarea" class="validate" id="service_description" ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <label for="business_hours">Business Hours</label>
                        <input type="text"  class="validate" id="business_hours" />
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <img id="item_image" src="" class="img-responsive" width="250px; height:250px"/>   <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Upload Logo</span>
                                <input id="picture" name="picture" type="file" onchange="preview_file()" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <span>Would you like to upload your business' banner?</span>
                        <p>
                            <label>
                                <input id="no_banner" name="group1" value="no" type="radio" checked />
                                <span>No</span>
                            </label>

                            <label>
                                <input id="with_banner" name="group1" value="yes" type="radio" />
                                <span>Yes</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div id="banner_row" class="col s12 m6" hidden>
                        <img id="banner_image" src="" class="img-responsive" width="720" height="500"/>   <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Upload Banner</span>
                                <input id="banner" name="banner"  type="file" onchange="preview_file_banner()" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col offset-s1">
                        <button id="back" class="btn btn-success">Back <i class="material-icons left">arrow_back</i></button>
                    </div>
                    <div class="col offset-s2">
                        <button type="submit"  id="save" class="btn btn-success">Next <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>

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
                steps: ['Business Signup', 'Template Info', 'Packages&Contracts','Finish'],
                currentStep: 2
            });
            var business_id ={{$business->id}};
            $.get('/get-biz-template/'+business_id,function (data) {
               console.log("data",data);
               var template = data.template;
               $("#business_about_us").val(template.business_about_us);
                $("#service_description").val(template.service_description);
                $("#business_hours").val(template.business_hours);
                $("#item_image").attr('src','/'+template.logo_url);
                $("#item_image").show();
                var with_banner = template.with_banner;
                if(with_banner=="yes"){
                    $("#banner_image").attr('src','/'+template.banner_url);
                    $("#banner_row").show();
                    $("#banner_image").show();
                    $("#with_banner").attr("checked",true);
                }
                M.updateTextFields();
            });

            $('#business_info').submit(function (e) {
                e.preventDefault();
//                alert($('#business_about_us').val());
                var formData = new FormData();
                formData.append('business_about_us',$('#business_about_us').val());
                formData.append('service_description',$('#service_description').val());
                formData.append('business_hours',$('#business_hours').val());
                formData.append('with_banner',$('#with_banner').val());
                formData.append('business_id',$('#business_id').val());
                formData.append('_token', $('input[name="_token"]').val());
                console.log("formdata",formData);

                jQuery.each(jQuery('#picture')[0].files, function (i, file) {
                    formData.append('logo', file);
                });
                jQuery.each(jQuery('#banner')[0].files, function (i, file) {
                    formData.append('banner', file);
                });

                $.ajax({
                    url: "{{ route('package_contracts') }}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: 'post',
                    success: function (response, a, b) {
                        console.log("success",response);
                        window.location.href = "/packages-contracts";
                    },
                    error: function (response) {
                        console.log("error",response);
                        console.log("An error occured please try again, or contact support@thego.co.za.")
//                        window.location.reload();
                    }
                });
            });

            $("#item_image").hide();
            $("#banner_image").hide();

            $('input:radio').click(function () {
                var selected_val = $(this).val();
                console.log("selected value",selected_val);
                if(selected_val=="yes"){
                    $("#banner_row").show();
                    sessionStorage.setItem("with_banner","yes");
                }else{
                    $("#banner_row").hide();
                    sessionStorage.setItem("with_banner","no");
                }
            });

            $("#back").on('click',function(e){
//                alert("Button clicked");
                e.preventDefault();
               window.location.href = "/business_register";
            });
        });
        function preview_file(){
            var preview = document.getElementById("item_image"); //selects the query named img
            var file    = document.querySelector('input[type=file]').files[0]; //sames as here
            var reader  = new FileReader();
            console.log("Changing banners",file);
            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file); //reads the data as a URL
                $("#item_image").show();

            } else {
                preview.src = "";
            }

        }
        function preview_file_banner(){
            console.log("Changing banners");
            var preview = document.getElementById("banner_image"); //selects the query named img
            var file    = document.querySelector('#banner').files[0]; //sames as here
            console.log("Changing banners",file);
            var reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file); //reads the data as a URL
                $("#banner_image").show();
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection


