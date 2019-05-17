<div class="row">
    <div class="col-md-3 newHot">
        <div class="box">
            <svg><rect></rect></svg>
            <div class="content">
                <img src="https://turinto.net/wp-content/uploads/2019/04/combo1-trenweb.jpg">
            </div>
        </div>
        <p>GIẢM GIÁ NHIỀU COMBO ĐẶC BIỆT</p>
        <a class="sale" href="#" data-text="Click xem ngay"><span>Click xem ngay</span></a>
    </div>
    <div class="col-md-9 col-sm-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="/img/carousel/g2.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="/img/carousel/g4.jpg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                    <img src="/img/carousel/g7.jpg" alt="New york" style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<style>
    .box
    {
        position: absolute;
        top: 225px;
        left: 53%;
        transform: translate(-50%, -50%);
        width: 445px;
        height: 445px;
        background: #fff;
        box-sizing: border-box;
        border:2px solid #ffff;
    }
    .box .content{
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border: 2px solid #ffeb3b;
        padding: 5px;
        /*box-shadow: 0 5px 10px rgba(0,0,0,.5);*/
        text-align: center;
    }
    .box .content h1{
        color: #fff;
        font-size: 30px;
        margin: 0 0 10px;
        padding: 0;

    }
    .box .content p{
        color: #fff;
    }
    .box svg,
    .box svg rect{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        fill: transparent;
    }
    .box svg rect{
        stroke: #f72359;
        stroke-width:5px;
        stroke-dasharray: 400;
        animation: animate 3s linear infinite;

    }

    @keyframes animate
    {
        0%{
            stroke-dashoffset:800;
        }
        100%{
            stroke-dashoffset:0;
        }

    }

    .content img {
        width: 100%;
    }
    .newHot > p{
        position: absolute;
        top: 200px;
        font-size: 14px;
        font-weight: bold;
        left: 25%;
    }

    .newHot  a {
        position: absolute;
        left: 50%;
        font-family: 'Montserrat', Arial, sans-serif;
        font-size: 24px;
        font-weight: 700;
        color: #f72359;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        text-shadow: 0 0 0.15em #DD2911;
        user-select: none;
        white-space: nowrap;
        filter: blur(0.007em);
        animation: shake 2.5s linear forwards;
    }

    .sale span {
        position: absolute;
        top: 240px;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-clip-path: polygon(10% 0%, 44% 0%, 70% 100%, 55% 100%);
        clip-path: polygon(10% 0%, 44% 0%, 70% 100%, 55% 100%);
    }

    .sale::before,
    .sale::after {
        content: attr(data-text);
        position: absolute;
        top: 240px;
        left: 50%;
    }

    .sale::before {
        animation: crack1 2.5s linear forwards;
        -webkit-clip-path: polygon(0% 0%, 10% 0%, 55% 100%, 0% 100%);
        clip-path: polygon(0% 0%, 10% 0%, 55% 100%, 0% 100%);
    }

    .sale::after {
        animation: crack2 2.5s linear forwards;
        -webkit-clip-path: polygon(44% 0%, 100% 0%, 100% 100%, 70% 100%);
        clip-path: polygon(44% 0%, 100% 0%, 100% 100%, 70% 100%);
    }

    @keyframes shake {
        5%, 15%, 25%, 35%, 55%, 65%, 75%, 95% {
            filter: blur(0.018em);
            transform: translateY(0.018em) rotate(0deg);
        }

        10%, 30%, 40%, 50%, 70%, 80%, 90% {
            filter: blur(0.01em);
            transform: translateY(-0.018em) rotate(0deg);
        }

        20%, 60% {
            filter: blur(0.03em);
            transform: translate(-0.018em, 0.018em) rotate(0deg);
        }

        45%, 85% {
            filter: blur(0.03em);
            transform: translate(0.018em, -0.018em) rotate(0deg);
        }

        100% {
            filter: blur(0.007em);
            transform: translate(0) rotate(-0.5deg);
        }
    }

    @keyframes crack1 {
        0%, 95% {
            transform: translate(-50%, -50%);
        }

        100% {
            transform: translate(-51%, -48%);
        }
    }

    @keyframes crack2 {
        0%, 95% {
            transform: translate(-50%, -50%);
        }

        100% {
            transform: translate(-49%, -53%);
        }
    }
</style>