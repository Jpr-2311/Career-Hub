@include('partials.header')
@include('partials.navbar')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    rel="stylesheet" />
<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white !important;
        background-color: #0d6efd;
        padding: 0.2rem;
    }

</style>
<!--Register-->
<header class="page-section">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-left">
            <div class="col-lg-8 col-xl-6 text-left">
                @if (count($errors) > 0)
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="list-style:none"><i class="fas fa-exclamation-circle"></i>{{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                @endif

            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-left mb-5">
            <div class="col-lg-12">

                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->


        

                @include('partials.userProfiles.experience')

    


                  








            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        // document.getElementById('previousBtn').style.display = 'none';
        // document.getElementById('submitButton2').style.display = 'none';
        // document.getElementById('step2').style.display = 'none';
        // document.getElementById('step3').style.display = 'none';

        function previous() {

            if ($('#step2').is(':visible')) {
                document.getElementById('step1').style.display = 'block';
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step3').style.display = 'none';

                document.getElementById('previousBtn').style.display = 'none';
                document.getElementById('nextBtn').style.display = 'block';
                document.getElementById('submitButton2').style.display = 'none';
            } else if ($('#step3').is(':visible')) {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
                document.getElementById('step3').style.display = 'none';

                document.getElementById('previousBtn').style.display = 'block';
                document.getElementById('nextBtn').style.display = 'block';
                document.getElementById('submitButton2').style.display = 'none';

            }
        }

        function next() {
            if ($('#step1').is(':visible')) {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
                document.getElementById('step3').style.display = 'none';

                document.getElementById('previousBtn').style.display = 'block';
                document.getElementById('nextBtn').style.display = 'block';
            } else if ($('#step2').is(':visible')) {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step3').style.display = 'block';
                document.getElementById('previousBtn').style.display = 'block';
                document.getElementById('nextBtn').style.display = 'none';
                document.getElementById('submitButton2').style.display = 'block';
            }


        }
    </script> -->
</header>
<!-- Footer-->

@include('partials.footer')
<!-- Back to top button -->
<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
    <i class="bi-arrow-up-circle fs-1 text-primary"></i>
</button>
<!-- <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - KashEza</div></div> -->









<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>









{{-- tag input js --}}
<script>
    $(function() {
        $('#tetst')
            .on('change', function(event) {
                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput')) return;

                var val = $element.val();
                if (val === null) val = 'null';
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(
                    $.isArray(val) ?
                    JSON.stringify(val) :
                    '"' + val.replace('"', '\\"') + '"'
                );
                $('code', $('pre.items', $container)).html(
                    JSON.stringify($element.tagsinput('items'))
                );
            })
            .trigger('change');
    });
</script>
{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
{{-- education dynamic inputs js --}}

<script type="text/javascript">
    clone = $("#education_group_input_row").clone()
        .eq( 0 )
        .clone()
        .find("input")
        .val("")
        .end();
    var count = 1
    $("#rowAdder_education").click(function() {
        clone4 = clone.clone()
        clone4.find("#is_studying").prop("id", "is_studying" + count);
        clone4.find("#is_studying_label").prop("for", "is_studying" + count);
        clone4.insertBefore("#education_group_dynamic_row");

        count++;
    });

    $("body").on("click", "#DeleteRow_education", function() {
        var conveniancecount = $("div[id*='education_group_input_row']").length;
        $(this).parents("#education_group_input_row").remove();

    })


        $("body").on("click", ".is_studying", function() {
            console.log($(this).is(':checked'))
            if ($(this).is(':checked')) {
                    $(this).parents("#education_group_input_row").find('#end_date').hide();
            }else{
                    $(this).parents("#education_group_input_row").find('#end_date').show();
            }

        })
</script>
{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
{{-- Professional experience dynamic inputs js --}}
<script type="text/javascript">
    var clone2 = $("#experience_group_input_row").clone()
        .eq( 0 )
        .clone()
        .find("input")
        .val("")
        .end();
    var count1 = 1
    $("#rowAdder_experience").click(function() {
        clone3= clone2.clone();
        clone3.find("#is_working").prop("id", "is_working" + count1);
        clone3.find("#is_working_label").prop("for", "is_working" + count1);
        clone3.insertBefore("#experience_group_dynamic_row");
        count1++;
    });

    $("body").on("click", "#DeleteRow_experience", function() {
        var conveniancecount = $("div[id*='experience_group_input_row']").length;
        $(this).parents("#experience_group_input_row").remove();

    })

            $("body").on("click", ".is_working", function() {
            if ($(this).is(':checked')) {
                    $(this).parents("#experience_group_input_row").find('#experience_end_date_div').hide();
            }else{
                    $(this).parents("#experience_group_input_row").find('#experience_end_date_div').show();
            }

        })
</script>
</body>

</html>
