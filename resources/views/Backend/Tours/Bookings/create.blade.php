@extends('Backend._Layouts.master_layout')
@section('css')
    <!-- plugins -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('BackendTheme/asset/css/plugins/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('BackendTheme/asset/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('BackendTheme/asset/css/plugins/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('BackendTheme/asset/css/plugins/ionrangeslider/ion.rangeSlider.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('BackendTheme/asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('BackendTheme/asset/css/plugins/bootstrap-material-datetimepicker.css')}}"/>
@endsection
@section('content')
    <div id="content">
        <div class="tabs-wrapper text-center">
            <div class="panel box-shadow-none text-left content-header">
                <div class="panel-body" style="padding-bottom:0px;">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Travellers Details Form</h3>
                        {{--<p class="animated fadeInDown">--}}
                        {{--Ui Element <span class="fa-angle-right fa"></span> Tabs & Panels--}}
                        {{--</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <form method="post" enctype="multipart/form-data" action="{{route('bookingsTour.save')}}">
                            @csrf

                            @if($data['no_of_People']>=1)
                                @for($i=1;$i<=$data['no_of_People'];$i++)
                                    <h2>Traveler Detail Form {{$i+1}}</h2>
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text" class="form-text" required
                                               name="bookingTour_traveller_name[]">
                                        <span class="bar"></span>
                                        <label>Traveller's Name</label>
                                    </div>
                                    <div class="form-group" style="margin-top:40px !important;">
                                        <label>Traveller's Gender</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <select class="select2-A" name="bookingTour_traveller_gender[]"
                                                        required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-animate-text">
                                        <input class="form-text dateAnimate" required="" data-dtp="dtp_g91iZ"
                                               type="text" name="bookingTour_traveller_dob[]">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-calendar"></span>Traveller's Date of Birth</label>
                                    </div>

                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text" class="form-text" required
                                               name="bookingTour_traveller_phone_no[]">
                                        <span class="bar"></span>
                                        <label>Traveller's Contact No.</label>
                                    </div>
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text" class="form-text" required
                                               name="bookingTour_traveller_address[]">
                                        <span class="bar"></span>
                                        <label>Traveller's Address</label>
                                    </div>
                                    <hr/>
                                @endfor

                            @else
                                At least one traveller needed.
                        @endif
                        <!-- Booked By -->
                            <hr/>
                            <h2>Booked By :</h2>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" required name="bookingTour_booking_done_by">
                                <span class="bar"></span>
                                <label>Name:</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" required
                                       name="bookingTour_phone_no">
                                <span class="bar"></span>
                                <label>Contact No.</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" required name="bookingTour_email">
                                <span class="bar"></span>
                                <label>Email-ID</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input class="submit btn btn-success" value="Submit" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: content -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- plugins -->
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/moment.min.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/jquery.knob.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/ion.rangeSlider.min.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/jquery.nicescroll.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/jquery.mask.min.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('BackendTheme/asset/js/plugins/jquery.validate.min.js')}}"></script>


    <!-- custom -->
    <script src="{{URL::asset('BackendTheme/asset/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#signupForm").validate({
                errorElement: "em",
                errorPlacement: function (error, element) {
                    $(element.parent("div").addClass("form-animate-error"));
                    error.appendTo(element.parent("div"));
                },
                success: function (label) {
                    $(label.parent("div").removeClass("form-animate-error"));
                },
                rules: {
                    validate_firstname: "required",
                    validate_lastname: "required",
                    validate_username: {
                        required: true,
                        minlength: 2
                    },
                    validate_password: {
                        required: true,
                        minlength: 5
                    },
                    validate_confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#validate_password"
                    },
                    validate_email: {
                        required: true,
                        email: true
                    },
                    validate_agree: "required"
                },
                messages: {
                    validate_firstname: "Please enter your firstname",
                    validate_lastname: "Please enter your lastname",
                    validate_username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    validate_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    validate_confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    validate_email: "Please enter a valid email address",
                    validate_agree: "Please accept our policy"
                }
            });

            // propose username by combining first- and lastname
            $("#username").focus(function () {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                if (firstname && lastname && !this.value) {
                    this.value = firstname + "." + lastname;
                }
            });


            $('.mask-date').mask('00/00/0000');
            $('.mask-time').mask('00:00:00');
            $('.mask-date_time').mask('00/00/0000 00:00:00');
            $('.mask-cep').mask('00000-000');
            $('.mask-phone').mask('0000-0000');
            $('.mask-phone_with_ddd').mask('(00) 0000-0000');
            $('.mask-phone_us').mask('(000) 000-0000');
            $('.mask-mixed').mask('AAA 000-S0S');
            $('.mask-cpf').mask('000.000.000-00', {reverse: true});
            $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
            $('.mask-money2').mask("#.##0,00", {reverse: true});
            $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/, optional: true
                    }
                }
            });
            $('.mask-ip_address').mask('099.099.099.099');
            $('.mask-percent').mask('##0,00%', {reverse: true});
            $('.mask-clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
            $('.mask-placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
            $('.mask-fallback').mask("00r00r0000", {
                translation: {
                    'r': {
                        pattern: /[\/]/,
                        fallback: '/'
                    },
                    placeholder: "__/__/____"
                }
            });
            $('.mask-selectonfocus').mask("00/00/0000", {selectOnFocus: true});

            var options = {
                onKeyPress: function (cep, e, field, options) {
                    var masks = ['00000-000', '0-00-00-00'];
                    mask = (cep.length > 7) ? masks[1] : masks[0];
                    $('.mask-crazy_cep').mask(mask, options);
                }
            };

            $('.mask-crazy_cep').mask('00000-000', options);


            var options2 = {
                onComplete: function (cep) {
                    alert('CEP Completed!:' + cep);
                },
                onKeyPress: function (cep, event, currentField, options) {
                    console.log('An key was pressed!:', cep, ' event: ', event,
                        'currentField: ', currentField, ' options: ', options);
                },
                onChange: function (cep) {
                    console.log('cep changed! ', cep);
                },
                onInvalid: function (val, e, f, invalid, options) {
                    var error = invalid[0];
                    console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
                }
            };

            $('.mask-cep_with_callback').mask('00000-000', options2);

            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.mask-sp_celphones').mask(SPMaskBehavior, spOptions);


        });


        $(".select2-A").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        $(".select2-B").select2({
            tags: true
        });

        $("#range1").ionRangeSlider({
            type: "double",
            grid: true,
            min: -1000,
            max: 1000,
            from: -500,
            to: 500
        });

        $('.dateAnimate').bootstrapMaterialDatePicker({weekStart: 0, time: false, animation: true});
        $('.date').bootstrapMaterialDatePicker({weekStart: 0, time: false});
        $('.time').bootstrapMaterialDatePicker({date: false, format: 'HH:mm', animation: true});
        $('.datetime').bootstrapMaterialDatePicker({format: 'dddd DD MMMM YYYY - HH:mm', animation: true});
        $('.date-fr').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY HH:mm',
            lang: 'fr',
            weekStart: 1,
            cancelText: 'ANNULER'
        });
        $('.min-date').bootstrapMaterialDatePicker({format: 'DD/MM/YYYY HH:mm', minDate: new Date()});


        $(".dial").knob({
            height: 80
        });

        $('.dial1').trigger(
            'configure',
            {
                "min": 10,
                "width": 80,
                "max": 80,
                "fgColor": "#FF6656",
                "skin": "tron"
            }
        );

        $('.dial2').trigger(
            'configure',
            {

                "width": 80,
                "fgColor": "#FF6656",
                "skin": "tron",
                "cursor": true
            }
        );

        $('.dial3').trigger(
            'configure',
            {

                "width": 80,
                "fgColor": "#27C24C",
            }
        );
        )
        ;
    </script>
    <!-- end: Javascript -->
@endsection