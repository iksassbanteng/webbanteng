<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKSASS Banteng</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.css">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="Assets/css/card.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <div class="home-interface">
        <div class="apcr-top-wrp">
            <img class="apcr-top-item right" src="Assets/bantengjadi.png" alt="">
            <a class="apcr-top-item right" href="" onclick="document.getElementById('p-2').scrollIntoView({'behavior': 'smooth'});return false;">
                <img class="apcr-top-item right" style="border-radius:5px" src="Assets/IKSASS Santri Baru2.png" alt="">
            </a>
            <img class="apcr-top-item left" src="Assets/LOGO GADA.png" alt="">
            <img class="apcr-top-item left" style="padding:2px;" src="Assets/LOGO SW.png" alt="">
        </div>
        <div id="bwi-brand" class=" title-text-single coloring-text-logo typewriter col-6">
            <span class="b">B</span>anyuwangi <span class="b">T</span>engah
        </div>

        <div class="typewriter tag-line-single pt-3">
            Blarak Aii, Mayo Hang Gati, Kadere Banteng Anti Jarkoni
        </div>
        <form class="d-flex col-6 m-auto mt-5 ">
            <input class=" form-control me-2  " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="toolbar-container mt-5">

        <div class="tools-wrp-bottom">
            <div class="tool-bottom-wrp-icon">
                <img class="tool-bottom-icon" title="Profil" src="Assets/bantengjadi.png" alt="">
            </div>
            <div class="tool-bottom-text" title="Profil">Profil</div>
        </div>
        <div class="tools-wrp-bottom">
            <div class="tool-bottom-wrp-icon">
                <img class="tool-bottom-icon" title="Pengurus" src="Assets/LOGO GADA.png" alt="">
            </div>

            <div class="tool-bottom-text">Pengurus</div>
        </div>
        <div class="tools-wrp-bottom">
            <a href="newsportal">
                <div class="tool-bottom-wrp-icon">
                    <img class="tool-bottom-icon" title="Berita" src="Assets/LOGO SW.png" alt="">
                </div>

                <div class="tool-bottom-text">Berita</div>
            </a>
        </div>
        <div class="tools-wrp-bottom">
            <a href="http://localhost/banyuwangi_tengah/admin/login.php">
                <div class="tool-bottom-wrp-icon">
                    <img class="tool-bottom-icon" title="SILAB" src="Assets/job.png" alt="">
                </div>

                <div class="tool-bottom-text">Silab</div>
            </a>
        </div>
    </div>
    <?php
    session_start();
    include('newsportal/includes/config.php');

    ?>


    <div id="p-2-inner">
        <div style="height: 2rem"></div>
        <div class="container">
            <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Berita Terbaru <small style="float: right; font-size:0.9rem; line-height:2rem"><a href="#">Lainnya ></a><i class="fas fa-chevron-right" aria-hidden="true"></i> </small>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 4;
                $offset = ($pageno - 1) * $no_of_records_per_page;


                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-6 col-md-6 col-lg-3">
                        <a href="newsportal/news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" title=echo>
                            <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff; margin-bottom:1rem;">
                                <div style="
              border-radius:15px 15px 0px 0px;
              width:100%;
              height:150px;
              background-image: url('newsportal/admin/postimages/<?php echo htmlentities($row['PostImage']); ?>');
              background-size:cover; 
              background-position:center;
              overflow:hidden;
              float:right;
              ">

                                </div>
                                <div style="
                                background: #ffffff;
                                padding:1rem;
                                border-radius: 15px 15px 15px 15px ; 
                                text-align:left; 
                                font-weight:600">
                                    <?php echo htmlentities($row['posttitle']); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>


            </div>
        </div>

    </div>
    <div class="container">
        <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Galeri <small style="float: right; font-size:0.9rem; line-height:2rem"><a href="https://banyuwangikab.go.id/berita">Lainnya ></a><i class="fas fa-chevron-right" aria-hidden="true"></i> </small>
        </div>
        <div class="galery-container">

            <div class="galery-container-item">
                <div style="background: url('Assets/bantengjadi.png'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Bfest (Banteng Festival)
                    </div>

                </div>
            </div>


            <div class="galery-container-item">
                <div style="background: url('Assets/pasca\ kegiatan\ RAKER\ di\ malioboro\ jogjakarta.jpg'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Pasca Raker Malioboro
                    </div>

                </div>
            </div>


            <div class="galery-container-item">
                <div style="background: url('Assets/IMG_9851.JPG'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Wesi Kuning
                    </div>

                </div>
            </div>


            <div class="galery-container-item">
                <div style="background: url('Assets/IMG_9847.JPG'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Sayu Wiwit
                    </div>

                </div>
            </div>

            <div class="galery-container-item">
                <div style="background: url('Assets/tim\ banteng\ bersama\ kru\ sedekah\ jalanan.jpg'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Banteng x Sedekah Jalanan
                    </div>

                </div>
            </div>

            <div class="galery-container-item">
                <div style="background: url('Assets/Salah\ satu\ kaum\ duafa\ yang\ mendapatkan\ bantuan\ BANTENG\ KASIH.jpg'); background-size: cover;
    background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                    <div class="galery-container-text">
                        Kaum Dhuafa
                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- our team -->

    <!-- close our team -->

    <div class="container  " style="height: 100vr; margin-top: 100px;">
        <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Struktural <small style="float: right; font-size:0.9rem; line-height:2rem"><a href="#">Lainnya ></a><i class="fas fa-chevron-right" aria-hidden="true"></i> </small>
        </div>
        <div class="row ">

            <div class="bx">
                <div class="c">
                    <div class="iBx">
                        <img class="img" src="Assets/1.png" alt="images">
                    </div>
                    <div class="details">
                        <h2>Mohammad Nasta'in<br><span>Ketua Sub Rayon</span></h2>
                    </div>
                </div>
                <div class="c">
                    <div class="iBx">
                        <img class="img" src="Assets/IMG_9847.JPG" alt="images">
                    </div>
                    <div class="details">
                        <h2>Wildan Zilfi<br><span>Pimred Sayu WIwit</span></h2>
                    </div>
                </div>
                <div class="c">
                    <div class="iBx">
                        <img class="img" src="Assets/IMG_9851.JPG" alt="images">
                    </div>
                    <div class="details">
                        <h2>M.Ardi Al Miqdad<br><span>Jendral Wesi Kuning</span></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class=" bg-dark" style="margin-top: 10rem; height: 10rem;">
        <div class="conteiner position-absolute mt-5 ms-3">
            <p class=" fw-bold " style="color: var(--colorNavlink); margin-bottom: 0;"> IKSASS Sub Rayon Banyuwangi
                Tengah</p>
            <p class="fw-light colorNavlink disabled " style="color: var(--colorNavlink);font-size: 10pt;  margin-bottom: 0;">JL.KHR.As'ad
                Syamsul Arifin
                Gedung KAMTIB lt.2</p>
            <p class="fw-light colorNavlink disabled " style="color: var(--colorNavlink);font-size: 10pt;  margin-bottom: 0; ">0333 86783788
            </p>


        </div>
        <div class="container justify-content-center mt-5">


            <div class="social-media m-auto d-flex pt-4 " style="justify-content: center;">
                <div class="m-2">
                    <a href="#" class="colorNavlink"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="m-2">
                    <a href="#" class="colorNavlink"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="m-2">
                    <a href="#" class="colorNavlink"><i class="bi bi-youtube"></i></a>
                </div>
                <div class="m-2">
                    <a href="#" class="colorNavlink"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

        </div>

        <ul class="nav justify-content-center ">
            <li class="nav-item">
                <a class="nav-link colorNavlink " aria-current="page" href="#">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link colorNavlink " href="#">Kontak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link colorNavlink " href="#">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link colorNavlink  " href="#">Struktural</a>
            </li>
        </ul>
        <div class="m-auto pe-auto" style="color: var(--colorNavlink);font-size: 10pt;  padding-top: 23x; bottom: 0; text-align: center; ">
            &copy Copyright2022
            by ITIbrahimy
        </div>
    </footer>



    <script src="jquery-2.2.3.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="scripts.js"></script>
</body>

</html>