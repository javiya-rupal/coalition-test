<html>
    <head>
        <title>Coalition Products - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        {!! Html::script("js/jquery.min.js") !!}
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

<script type="text/javascript">
    // Attach a submit handler to the form
    $( "#productSubmit" ).click(function( event ) {


        var isValid = true;

        $('input[type="text"]').each(function () {

            if ($.trim($(this).val()) == '') {

                isValid = false;

                $(this).css({

                    "border": "1px solid red",

                    "background": "#FFCECE"

                });

            }

            else {

                $(this).css({

                    "border": "",

                    "background": ""

                });

            }

        });

        if (isValid == false) {


        e.preventDefault();
    }
        else {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $form = $(this),
                url = "/api/v1/product";
            var formData = {
                product_name: $('#product_name').val(),
                quantity_in_stock: $('#quantity_in_stock').val(),
                product_price: $('#product_price').val()
            }

            $.ajax({

                type: 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if (data.error == false) {
                        $('.alert-success').removeClass('text-hide');
                        window.location.href = "/add-product?action=success";
                    }


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
});

</script>