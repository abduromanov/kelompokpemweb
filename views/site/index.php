<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body:before {
          content: "";
          position: fixed;
          z-index: -1;
          background-size:cover;
          background-position:center top;
          display: block;
          background-image: url(../../images/background.jpg);
          width: 100%;
          height: 100%;
          filter: blur(5px) ;
          -webkit-filter: blur(5px);          
        }
    body{
        font-family:Helvetica;
    }
    </style>
</head>
<body>
    <?php

    /* @var $this yii\web\View */

        $this->title = 'Website Resmi | Sistem Billing Air Minum';
    ?>

    <div class="site-index">
    <div class="jumbotron" >
        <h1>
            <center>Selamat Datang!</center>
        </h1>
        <div class="container-fluid">
        <h2>
            <marquee>
              <center>Selamat datang di website kami! Sistem billing air minum</center>
            </marquee> 
        </h2> 
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
                <img src="../../images/1.jpg" alt="" style="width:1200px; height: 600px;">
              </div>

              <div class="item">
                <img src="../../images/2.jpg" alt="" style="width:1200px; height: 600px;">
              </div>
            
              <div class="item">
                <img src="../../images/3.png" alt="" style="width:1200px; height: 600px;">
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
    
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h3>Laporan Daftar Tagihan per Bulan</h3>

                <p>Laporan Daftar Tagihan berdasarkan tagihan setiap pelanggan untuk tempoh sebulan</p>

                <p><a class="btn btn-default" href="../transaksi/index">Laporannya &raquo;</a></p>
            </div><!-- 
            <div class="col-lg-4">
                <h3>Laporan Daftar Tagihan dan Pembayaran per tahun bulan</h3>

                <p>Laporan Tagihan berdsaarkan tagihan per tahun dan pembayaran per tahun</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div> -->
            <div class="col-lg-4">
                <h3>Laporan Daftar Pelanggan yang belum Membayar</h3>

                <p>Lihat daftar pelanggan yang belum bayar.</p>

                <p><a class="btn btn-default" href="../transaksi/index">Laporannya &raquo;</a></p>
            </div>
        </div>

    </div>
    </div>

</body>
</html>
