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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js" integrity="sha512-A2ag+feOqri5SJxJ54oIIFj9/JuhZqiNNwyNLiAvQIyxJQT5JvZzn17vAb4BkP0a210NWz1DlsnLuRKZdouBnw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css" integrity="sha512-wcf2ifw+8xI4FktrSorGwO7lgRzGx1ld97ySj1pFADZzFdcXTIgQhHMTo7tQIADeYdRRnAjUnF00Q5WTNmL3+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.css" integrity="sha512-AvKFSk9Z7MuAeE5k2ZGnzy6GudptrsVsJ8vRGhFKQQh+pALKAA/bklevEhHGMA6GIsUsNxm1+oAkbK/kyhtYrw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" rel="stylesheet">
</head>

<style>
    .ui-autocomplete {
        z-index: 100000000000 !important;
    }

    .token {
        height: auto !important;
    }

    .token .close {
        text-decoration: none !important;
        color: #212529;
    }
</style>

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
                            <li><a class="dropdown-item" href="../">Anasayfa</a></li>
                            <li><a class="dropdown-item" href="users">Kullanıcılar</a></li>
                            <li><a class="dropdown-item" href="questions">Sorular</a></li>
                            <li><a class="dropdown-item" href="tags">Taglar</a></li>
                            <li><a class="dropdown-item" href="answers">Yanıtlar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 d-flex">
                    <a class="navbar-brand" href="../">
                        Sor<mark style="background-color:white;color:#ef476f;">&</mark>Yanıtla
                    </a>
                </div>
            </div>
            <div class="row w-50">
                <div class="col">
                    <form action="../search" method="GET" name="ask_question_form">
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
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border:1px solid #bbc0c4;">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="../users/<?= $_SESSION['user']['username'] ?>">Profil</a></li>
                            <li><a class="dropdown-item" href="../user/edit">Profili Düzenle</a></li>
                            <hr class="m-1">
                            <li><a class="dropdown-item" href="../post/sign_out">Çıkış Yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Bitiş -->

    <!-- Anasayfa Container Başlangıç -->
    <div class="container">
        <div class="row mx-auto vh-100">
            <div class="col-md-2" style="border-right:1px solid #bbc0c4;">
            </div>
            <div class="col-md-7 p-4">
                <table class="table" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th class="col-md-1" scope="col">#</th>
                            <th class="col-md-3" scope="col">Başlık</th>
                            <th class="col-md-4" scope="col">İçerik</th>
                            <th class="col-md-1" scope="col">Tarih</th>
                            <th class="col-md-1" scope="col">Düzenle</th>
                            <th class="col-md-1" scope="col">Sil</th>
                        </tr>
                    </thead>
                    <?php foreach ($questions_limit as $question_limit) : $question_limit['content'] = preg_replace("/<img[^>]+\>/i", " ", $question_limit['content']);
                        $question_limit['content'] = preg_replace("/<br>/i", " ", $question_limit['content']); ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $question_limit['id'] ?></th>
                                <td><?= $question_limit['title'] ?></td>
                                <td class="text-truncate"><?= $question_limit['content'] ?></td>
                                <td><?= $question_limit['create_date'] ?></td>
                                <td>
                                    <a class="text-decoration-none" href="questions/<?= $question_limit['id'] ?>">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a class="text-decoration-none" href="questions/<?= $question_limit['id'] ?>/delete">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                <nav aria-label="...">
                    <ul class="pagination pagination-md justify-content-center pt-4">
                        <?php for ($page = 1; $page <= $questions_page; $page++) : ?>
                            <?php if (!isset($_GET['page'])) : if ($page == 1) : ?>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"><a class="text-decoration-none text-white" href="?page=<?= $page ?>"><?= $page ?></a></span>
                                    </li>
                                <?php endif;
                                if ($page != 1) : ?>
                                    <li class="page-item" aria-current="page">
                                        <span class="page-link"><a class="text-decoration-none text-primary" href="?page=<?= $page ?>"><?= $page ?></a></span>
                                    </li>
                                <?php endif;
                            else : if ($page == $_GET['page']) : ?>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"><a class="text-decoration-none text-white" href="?page=<?= $page ?>"><?= $page ?></a></span>
                                    </li>
                                <?php endif;
                                if ($page != $_GET['page']) : ?>
                                    <li class="page-item" aria-current="page">
                                        <span class="page-link"><a class="text-decoration-none text-primary" href="?page=<?= $page ?>"><?= $page ?></a></span>
                                    </li>
                        <?php endif;
                            endif;
                        endfor; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3" style="border-left:1px solid #bbc0c4;">
            </div>
        </div>
    </div>
    </div>
    <!-- Anasayfa Container Bitiş -->
    <script>
        $('.dropdown').bind('click', function(e) {
            e.stopPropagation()
        })
    </script>
    <script>
        function add_image() {
            var file = document.getElementById('t_image');
            var form = new FormData();
            form.append("image", file.files[0])

            var settings = {
                "url": "https://api.imgbb.com/1/upload?key=61dda3724073e5b3384fc1f3e7765fe8",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {
                var api = JSON.parse(response);
                $('#t_editor').append("<img src=" + api.data.url + " style='max-width:800px;max-height:400px'>");
                $('#a_q_data').val($('#t_editor').html().trim());
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#a_q_token').tokenfield({
                autocomplete: {
                    source: 'post/fetch_all_tags',
                    delay: 100
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#t_editor').on('input', function() {
                $('#a_q_data').val($('#t_editor').html().trim());
            })
        });
    </script>
</body>

</html>