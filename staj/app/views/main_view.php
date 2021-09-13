<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sor & Yanıtla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- Navbar Başlangıç -->
    <nav class="navbar sticky-top navbar-light bg-light" style="border-bottom:1px solid #bbc0c4;border-top:6px solid #ef476f;z-index:2;">
        <div class="container">
            <div class="row w-25">
                <div class="col-md-2">
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                        <ul class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Anasayfa</a></li>
                            <li><a class="dropdown-item" href="questions">Sorular</a></li>
                            <li><a class="dropdown-item" href="tags">Taglar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 d-flex">
                    <a class="navbar-brand" href="#">
                        Sor<mark style="background-color:white;color:#ef476f;">&</mark>Yanıtla
                    </a>
                </div>
            </div>
            <div class="row w-50">
                <div class="col">
                    <form action="search" method="GET" name="ask_question_form">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="position:absolute;top:50%;transform:translateY(-50%);margin-left:9px;color:#bbc0c4;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" name="title" class="form-control" placeholder="Ara..." style="text-indent: 18px;border-color:#bbc0c4;">
                    </form>
                </div>
            </div>
            <div class="row w-25">
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-light mx-1" data-bs-toggle="modal" data-bs-target="#sign_in_modal" style="border:1px solid #bbc0c4;">Giriş Yap</a>
                    <a class="btn btn-light mx-1" data-bs-toggle="modal" data-bs-target="#sign_up_modal" style="border:1px solid #bbc0c4;">Kayıt Ol</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Bitiş -->

    <!-- Anasayfa Container Başlangıç -->
    <div class="container">
        <div class="row">
            <div class="col-md-11 p-0 mx-auto">
                <div class="row" style=" 
                                    background-image:linear-gradient(to right , #ef476f 50%, transparent 0%);
                                    background-size: 4px;
                                    background-color: white;
                                    height:40px;">
                </div>
                <div class="row" style=" background-color: #ef476f;">
                    <div class="col-6">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ffd166);">
                            <div class="col-md-6 mb-md-0 p-md-4">
                                <img src="https://woobro.design/thumbnails/63/team-work-608a9725676f3.png" class="w-100" alt="..." style="filter: drop-shadow(3px 3px 0px #222);">
                            </div>
                            <div class="col-md-6 p-4 ps-md-0 d-flex flex-column justify-content-center">
                                <h5 class="mt-0">Topluluk</h5>
                                <h6>‎Sorulara yanıt bulmak ve katkıda bulunmak için topluluk tabanlı bir araç olmayı ve türkiyede popüler olarak hizmet vermeyi amaç olarak belirlemiş bir web sitesi.‎</h6>
                                <button type="button" class="btn btn-dark my-1" data-bs-toggle="modal" data-bs-target="#sign_in_modal">Topluluğa Katıl</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ffd166);">
                            <div class="col-md-6 mb-md-0 p-md-4">
                                <img src="https://woobro.design/thumbnails/65/remote-teamwork-608a988f7ecf6.png" class="w-100" alt="..." style="filter: drop-shadow(3px 3px 0px #222);">
                            </div>
                            <div class="col-md-6 p-4 ps-md-0 d-flex flex-column justify-content-center">
                                <h5 class="mt-0">Topluluk</h5>
                                <h6>‎Sorulara yanıt bulmak ve katkıda bulunmak için topluluk tabanlı bir araç olmayı ve türkiyede popüler olarak hizmet vermeyi amaç olarak belirlemiş bir web sitesi.‎</h6>
                                <button type="button" class="btn btn-dark my-1" data-bs-toggle="modal" data-bs-target="#sign_in_modal">Topluluğa Katıl</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 p-0 mx-auto">
                <div class="row" style=" 
                                    background-image:radial-gradient(#ffd166 50%, transparent 0%);
                                    background-size: 4px 4px;
                                    background-color: white;
                                    height:40px;
                                    background-position-x: 2px;">
                </div>
                <div class="row" style=" background-color: #ffd166;">
                    <div class="col-md-4">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ef476f);">
                            <div class="col-md-12 p-4 ps-md-4 d-flex flex-column justify-content-center">
                                <svg viewBox="0 0 24 24" width="36" height="36" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mx-auto">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                                <hr>
                                <h6>Problemini en iyi anlatacak şekilde hazırla ve topluluk ile paylaşmadan önce kurallara uygun şekilde düzenle.‎</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ef476f);">
                            <div class="col-md-12 p-4 ps-md-4 d-flex flex-column justify-content-center">
                                <svg viewBox="0 0 24 24" width="36" height="36" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mx-auto">
                                    <line x1="4" y1="9" x2="20" y2="9"></line>
                                    <line x1="4" y1="15" x2="20" y2="15"></line>
                                    <line x1="10" y1="3" x2="8" y2="21"></line>
                                    <line x1="16" y1="3" x2="14" y2="21"></line>
                                </svg>
                                <hr>
                                <h6>‎Problemini paylaşmadan önce problemine en uygun kategorileri seçmelisin.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ef476f);">
                            <div class="col-md-12 p-4 ps-md-4 d-flex flex-column justify-content-center">
                                <svg viewBox="0 0 24 24" width="36" height="36" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mx-auto">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <hr>
                                <h6>Problemini paylaştıktan sonra tek yapman gereken topluluktan yanıt gelene kadar beklemek.‎</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 p-0 mx-auto">
                <div class="row" style=" 
                                    background-image: linear-gradient(45deg, #ffffff 25%, #8338ec 25%, #8338ec 50%, #ffffff 50%, #ffffff 75%, #8338ec 75%, #8338ec 100%);
                                    background-size: 4px 4px;
                                    height:40px;">
                </div>
                <div class="row" style=" background-color: #8338ec;">
                    <div class="col-9 mx-auto">
                        <div class="row g-0 bg-light position-relative my-4 mx-4" style="filter: drop-shadow(4px 4px 0px black) drop-shadow(6px 6px 0px #ffd166);">
                            <div class="col-md-3 mb-md-0 p-md-4">
                                <img src="https://webtrolive.com/wp-content/uploads/2021/04/job_interview_background_candidate_icon_cartoon_character_6838338__1_-removebg-preview.png" class="w-100" alt="...">
                            </div>
                            <div class="col-md-9 p-4 ps-md-0 d-flex flex-column justify-content-center">
                                <h5 class="mt-0">İş İmkanı</h5>
                                <h6>‎İşveren ilanlarında, teknik konularda topluluğa bulunduğun katkılar görüşmelerine olumlu olarak yansıyacak ve iş görüşmen daha rahat olarak gerçekleşecektir.</h6>
                                <button type="button" class="btn btn-dark my-1" data-bs-toggle="modal" data-bs-target="#sign_in_modal">Topluluğa Katıl</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Anasayfa Container Bitiş -->
    <!-- Kayıt Ol Modal -->
    <div class="modal fade" id="sign_up_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kayıt Ol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="post/sign_up" method="POST" name="sign_up_form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kullanıcı Adı</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="s_up_username" class="form-control" pattern="[a-z0-9-.]{1,20}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="s_up_email" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">Şifre</label>
                            <input type="password" name="s_up_password" class="form-control" id="exampleDropdownFormPassword1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="sign_up" class="btn btn-primary">Kayıt Ol</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Kayıt Ol Modal Bitiş -->
    <!-- Giriş Yap Modal -->
    <div class="modal fade" id="sign_in_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Giriş Yap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="post/sign_in" method="POST" name="sign_in_form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kullanıcı Adı</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="s_in_username" class="form-control" pattern="[a-z0-9-.]{1,20}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">Şifre</label>
                            <input type="password" name="s_in_password" class="form-control" id="exampleDropdownFormPassword1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="sign_in" class="btn btn-primary">Giriş Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Giriş Yap Modal Bitiş -->
    <script>
        $('.dropdown').bind('click', function(e) {
            e.stopPropagation()
        })
    </script>
</body>

</html>