<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Image show</title>
    <link href="{{ public_path('/assets/css/card.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="main" id="main">
            <div class="header">
                <img src="{{ public_path('/assets/img/logo2.png')}}" alt="">
                <span></span>
                <h2>Gem Testing India</h2>
                <h4>Gmological <br> Leboratory</h4>
            </div>
            <div class="body">
                <div class="name">
                    <hr>
                    <p>Gemstone Identification Report</p>
                    <hr>
                </div>
                <div class="desc">
                    <div class="table">
                        <p>Report Number</p>
                        <p>{{ $gem->report_number }}</p>

                        <p>Weight of stone</p>
                        <p>{{ $gem->weight }}</p>

                        <p>Dimension</p>
                        <p>{{ $gem->dimension }}</p>

                        <p>Color</p>
                        <p>{{ $gem->color }}</p>

                        <p>Shape & Cut</p>
                        <p>{{ $gem->shape_cut }}</p>

                        <p>Optic Character</p>
                        <p>{{ $gem->optic_char }}</p>

                        <p>Refractive Index</p>
                        <p>{{ $gem->refractive_index }}</p>

                        <p>Specific Gravity</p>
                        <p>{{ $gem->specific_gravity }}</p>

                        <p>Microscope View</p>
                        <p>{{ $gem->microscope_view }}</p>

                        <p>Species</p>
                        <p>{{ $gem->species }}</p>

                        <p>Comments</p>
                        <p>{{ $gem->comments }}</p>

                    </div>

                    <div class="product-img">
                        <img src="{{ public_path('/images/gems/'.$gem->image) }}" alt="">
                        <div class="stamp">
                            <img src="{{ public_path('assets/img/SEAL.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="title">
                        <p>Natiral Emerald</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>