<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale="1.0" />
        <title>Document</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap');

        * {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: "Raleway", sans-serif;
            background-color: #d8dada;
            font-size: 19px;
            margin: 0 auto;
            padding: 3%;
        }

        img {
            max-width: 100%;
        }

        header {
            width: 98%;
        }

        #logo {
            max-width: 120px;
            margin: 3% 0 3% 3%;
            float: left;
        }

        #wrapper {
            background-color: #f0f6fb;
        }

        #social {
            float: right;
            margin: 3% 2% 4% 3%;
            list-style-type: none;
        }

        #social > li {
            display: inline;
        }

        #social > li > a > img {
            max-width: 35px;
        }

        h1,
        p {
            margin: 3%;
        }

        .btn {
            float: right;
            margin: 0 2% 4% 0;
            background-color: #303840;
            color: #f6faff;
            text-decoration: none;
            font-weight: 800;
            padding: 8px 12px;
            border-radius: 8px;
            letter-spacing: 2px;
        }

        hr {
            height: 1px;
            background-color: #303840;
            clear: both;
            width: 96%;
            margin: auto;
        }

        #contact {
            text-align: center;
            padding-bottom: 3%;
            line-height: 16px;
            font-size: 12px;
            color: #303840;
        }

        </style>
</head>
<body>
    <div id="wrapper">
        <header>
            <div id="logo">
                <img src="img/logo.png" alt="" />
            </div>
            <div>
                <ul id="social">

                    <!---sosmed--->
                    <li>
                        <a href="#" target="_blank"
                        ><img src="img/blablabla.png" alt=""
                        /></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"
                        ><img src="img/blablabla.png" alt=""
                        /></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"
                        ><img src="img/blablabla.png" alt=""
                        /></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"
                        ><img src="img/blablabla.png" alt=""
                        /></a>
                    </li>
                </ul>
        </header>
        <div id="banner">
            <img src="img/banner.jpg" alt="" />
        </div>
        <div class="one-col">
            <h1>Produk Baru!</h1>
            <p>Lorem ipsum dolor sit amet</p>

            <p>Lorem ipsum dolor sit amet</p>

            <a href="#" class="btn">Learn More</a>

            <hr />

            <footer>
                <p id="contact">
                    SharedGame <br />
                    PT. Sharing Time <br />
                    Jl. M. H. Thamrin Boulevard 1100, Lippo Village, Tangerang, 15811 <br />
                    cs@sharedgame.tech
                </p>
            </footer>
        </div>
    </div>
</body>
</html>