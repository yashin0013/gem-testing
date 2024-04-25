<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image show</title>
    <!-- <link href="/assets/css/card.css" rel="stylesheet"> -->
<style>
    * {
    margin: 0;
    padding: 0;
}

.container{
    /* width: 70%; */
    margin: 0px auto;
}

/* header section  */

.header {
    /* display: flex;
    align-items: center;
   justify-content: space-between; */
/* width: 100%; */
position: relative;
height: 90px;
}

.header img {
    width: 80px;
    /* float: left; */
    padding: 5px 10px;
    position: absolute;
    left: 0;
    top:50%;
    /* clear: left; */
    position:absolute;
    left:0%;
    transform: translateY(-50%);
    border-radius:50%;
}

.header h2 {
    font-size: 30px;
    color: #2b2828;
    text-transform: uppercase;
    padding-left: 20px;
    position: absolute;
    /* left: 272px; */
    /* top: 15px; */
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
}

.header h4 {
    position:absolute;
    right:0%;
    top:50%;
    transform:translateY(-50%);
}

.header > span {
    position: absolute;
    top: -15px;
    left: 0px;
    height: 50px;
    width: 2px;
    background-color: #958682;
}

.header h4 {
    font-size: 20px;
    background-color: #a56527;
    color: white;
    padding: 15px 34px 15px 15px;
    border-radius: 5px;
    text-transform: uppercase;
    position: absolute;
    right: 0;
}

/* Body section  */

.header_wrap {
    background-color:#defadf;
}

.name {
    /* display: flex;
    align-items: center;
    justify-content: space-between; */
    position:relative;
    height:40px;
}

.name hr{
    position:absolute;
    top: 50%;
    left:0px;
    transform:translateY(-50%);
}

.name p {
    position:absolute;
    left:50%;
    background-color:#fff;
    top:50%;
    transform:translate(-50%,-50%);
    padding-left:10px;
    padding-right:10px;
}

.name hr {
    border: none;
    height: 2px;
    background-color: #958682;
    width: 100%;
}

.name p {
    width: fit-content;
    text-wrap: nowrap;
    /* margin: 10px; */
    text-align: center;
    font-size: 20px;
    color: #463e3c;
}

.body .desc {
    /* display: flex; */
    /* justify-content: space-between; */
    background-image: url("assets/img/img-bg.png");
    /* background-color: #cccccc; */
    /* height: 500px; */
    background-position: center;
    background-repeat: no-repeat;
    background-size: 300px auto;
    position: relative;
    /* align-items: center; */
    /* margin-top: 90px; */
    margin-left:50px;
    margin-right:50px;
}

.body .desc .table {
    display: grid;
    grid-template-columns: auto auto;
    /* background-color: #2196f3; */
    /* padding: 10px; */
    width: 50%;
}

.body .desc .table p {
    /* background-color: rgba(255, 255, 255, 0.8); */
    /* border: 1px solid rgba(0, 0, 0, 0.8); */
    padding: 15px;
    font-size: 15px;
    text-align: left;
    line-height: 0;
}

.body .desc .product-img {
    width: 150px;
    height: 250px;
}

.body .desc table {
    width:50%;
    margin-top:20px;
}

.body .desc .product-img img {
    width: 115px;
    height: auto;
}

.body .desc .product-img .stamp {
    position: absolute;
    bottom: -46px;
    right: -32px;
    width: 180px;
}

.footer .title {
   margin-top:20px    
}

.footer .title p{
    display: inline-block;
    border: 2px solid black;
    padding: 6px 68px;
    /* margin-left: 8vh; */
    font-size: 20px;
    font-weight: bolder;
}

.product_image {
    width:15%;
    position:absolute;
    top:0;
    right:0;
}
.product_image img {
    width:100%;
}
.stamp_image{
    width: 10%;
    position: absolute;
    right: 10px;
    top: 250px;
}
.stamp_image img {
    width: 100%;
}
</style>
</head>

<body>

    <div class="container">
        <div class="main" id="main">
            <div class="header_wrap">
                <div class="header">
                    <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/img/img-bg.png')))}}" alt="">
                    <h2>Gem Testing India</h2>
                    <h4>Gmological <br> Leboratory</h4>
                </div>
                <div class="name">
                    <hr>
                    <p>Gemstone Identification Report</p>
                    <!-- <hr> -->
                </div>
            </div>
            <div class="body">
                <div class="desc">
                    <table>
                        <tr>
                            <td style="width:10%">Report Number</td>
                            <td style="width:10%">{{ $gem->report_number }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Weight of stone</td>
                            <td style="width:10%">{{ $gem->weight }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Dimension</td>
                            <td style="width:10%">{{ $gem->dimension }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Color</td>
                            <td style="width:10%">{{ $gem->color }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Shape & Cut</td>
                            <td style="width:10%">{{ $gem->shape_cut }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Optic Character</td>
                            <td style="width:10%">{{ $gem->optic_char }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Refractive Index</td>
                            <td style="width:10%">{{ $gem->refractive_index }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Specific Gravity</td>
                            <td style="width:10%">{{ $gem->specific_gravity }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Microscope View</td>
                            <td style="width:10%">{{ $gem->microscope_view }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Species</td>
                            <td style="width:10%">{{ $gem->species }}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Comments</td>
                            <td style="width:10%">{{ $gem->comments }}</td>
                        </tr>
                    </table>
                    <div class=product_image>
                            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/gems/'.$gem->image)))}}" alt="">
                        </div>
                        <div class="stamp_image">
                        <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/img/SEAL.png')))}}" alt="">
                    </div>
                </div>
                <div class="footer">
                    <div class="title">
                        <p>{{$gem->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>