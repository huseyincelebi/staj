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
                            <li><a class="dropdown-item" href="./">Anasayfa</a></li>
                            <li><a class="dropdown-item" href="../questions">Sorular</a></li>
                            <li><a class="dropdown-item" href="../tags">Taglar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 d-flex">
                    <a class="navbar-brand" href="./">
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
                    <a class="btn btn-light mx-1" data-bs-toggle="modal" data-bs-target="#sign_in_modal" style="border:1px solid #bbc0c4;">Giriş Yap</a>
                    <a class="btn btn-light mx-1" data-bs-toggle="modal" data-bs-target="#sign_up_modal" style="border:1px solid #bbc0c4;">Kayıt Ol</a>
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
                <div class="row">
                    <div class="col">
                        <h1 class="lead fs-3"><strong><?= $username ?> Adlı Kullanıcının Profili</strong></h1>
                    </div>
                </div>
                <div class="row mt-4 align-items-center">
                    <div class="col">
                        <?php if (!isset($_GET['filter']) or $_GET['filter'] != 'answers') : ?>
                            <h1 class="lead fs-6"><strong>Toplam <?= count($questions_count) ?> soru bulundu</strong></h1>
                        <?php else : ?>
                            <h1 class="lead fs-6"><strong>Toplam <?= count($answers_count) ?> yanıt bulundu</strong></h1>
                        <?php endif; ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <?php if (isset($_GET['page'])) : ?>
                                <a href="<?= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?page=' . $_GET['page']; ?>&filter=questions" type="button" class="btn btn-primary">Sorular</a>
                                <a href="<?= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?page=' . $_GET['page']; ?>&filter=answers" type="button" class="btn btn-outline-primary">Yanıtlar</a>
                            <?php else : ?>
                                <a href="?filter=questions" type="button" class="btn btn-primary">Sorular</a>
                                <a href="?filter=answers" type="button" class="btn btn-outline-primary">Yanıtlar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr class="mt-3">
                </div>
                <?php foreach ($questions as $question) : if (!isset($_GET['filter']) or $_GET['filter'] != 'answers') : ?>
                        <div class="row">
                            <div class="col">
                                <a class="lead fs-3 text-decoration-none text-dark" href="<?= "../questions/" . $question['unique_id'] . "/" . $question['url'] ?>"><strong><?= $question['title'] ?> <?php if ($question['solution'] == 1) : ?><svg viewBox="0 0 24 24" width="24" height="24" stroke="#ef476f" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                            </svg><?php endif; ?></strong></a>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col mb-2">
                                <a class="lead fs-6 text-decoration-none text-dark text-truncate" style="display:block;max-height:60px;"><strong><?php
                                                                                                                                                    $question['content'] = preg_replace("/<img[^>]+\>/i", " ", $question['content']);
                                                                                                                                                    $question['content'] = preg_replace("/<br>/i", " ", $question['content']);
                                                                                                                                                    echo $question['content'];
                                                                                                                                                    ?></strong></a>
                            </div>
                            <div class="d-flex mt-4 justify-content-between">
                                <div>
                                    <a class="lead fs-6 text-decoration-none text-dark"><strong>Tag :</strong></a>
                                    <?php foreach ($questions_tags as $questions_tag) : if ($questions_tag['question_id'] == $question['id']) : ?>
                                            <a class="badge bg-secondary text-decoration-none text-white" href="tags/<?= $tags[array_search($questions_tag['tag_id'], array_column($tags, 'id'))]['id']; ?>"><?= $tags[array_search($questions_tag['tag_id'], array_column($tags, 'id'))]['name']; ?></a>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                                <div class="d-flex flex-column">
                                    <a class="lead fs-6 text-decoration-none text-dark text-decoration-none" href="../users/<?= $users[array_search($question['user_id'], array_column($users, 'id'))]['username']; ?>"><strong><?= $users[array_search($question['user_id'], array_column($users, 'id'))]['username']; ?></strong></a>
                                    <span class="badge bg-secondary"><?= $question['create_date']; ?></span>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col">
                                <?php foreach ($answers_question as $answer_question) : if ($question['question_id'] == $answer_question['id']) : ?>
                                        <a class="lead fs-3 text-decoration-none text-dark" href="<?= "questions/" . $answer_question['unique_id'] . "/" . $answer_question['url'] ?>"><strong><?= $answer_question['title'] ?> <?php if ($answer_question['solution'] == 1) : ?><svg viewBox="0 0 24 24" width="24" height="24" stroke="#ef476f" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="9 11 12 14 22 4"></polyline>
                                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                    </svg><?php endif; ?></strong></a>
                                <?php endif;
                                endforeach ?>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col mb-2">
                                <a class="lead fs-6 text-decoration-none text-dark text-truncate" style="display:block;max-height:60px;"><strong><?php
                                                                                                                                                    $question['content'] = preg_replace("/<img[^>]+\>/i", " ", $question['content']);
                                                                                                                                                    $question['content'] = preg_replace("/<br>/i", " ", $question['content']);
                                                                                                                                                    echo $question['content'];
                                                                                                                                                    ?></strong></a>
                            </div>
                            <div class="d-flex mt-4 justify-content-between">
                                <div>
                                    <a class="lead fs-6 text-decoration-none text-dark"><strong>Tag :</strong></a>
                                    <?php foreach ($questions_tags as $questions_tag) : if ($questions_tag['question_id'] == $question['id']) : ?>
                                            <a class="badge bg-secondary text-decoration-none text-white" href="tags/<?= $tags[array_search($questions_tag['tag_id'], array_column($tags, 'id'))]['id']; ?>"><?= $tags[array_search($questions_tag['tag_id'], array_column($tags, 'id'))]['name']; ?></a>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                                <div class="d-flex flex-column">
                                    <a class="lead fs-6 text-decoration-none text-dark"><strong><?= $users[array_search($question['user_id'], array_column($users, 'id'))]['username']; ?></strong></a>
                                    <span class="badge bg-secondary"><?= $question['create_date']; ?></span>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                <?php endif;
                endforeach; ?>
                <nav aria-label="...">
                    <ul class="pagination pagination-md justify-content-center pt-4">
                        <?php if (!isset($_GET['filter'])) : for ($page = 1; $page <= $pages; $page++) : ?>
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
                            endfor;
                        else : ?>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                <?php if (!isset($_GET['page'])) : if ($page == 1) : ?>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link"><a class="text-decoration-none text-white" href="?page=<?= $page ?>&filter=<?= $_GET['filter'] ?>"><?= $page ?></a></span>
                                        </li>
                                    <?php endif;
                                    if ($page != 1) : ?>
                                        <li class="page-item" aria-current="page">
                                            <span class="page-link"><a class="text-decoration-none text-primary" href="?page=<?= $page ?>&filter=<?= $_GET['filter'] ?>"><?= $page ?></a></span>
                                        </li>
                                    <?php endif;
                                else : if ($page == $_GET['page']) : ?>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link"><a class="text-decoration-none text-white" href="?page=<?= $page ?>&filter=<?= $_GET['filter'] ?>"><?= $page ?></a></span>
                                        </li>
                                    <?php endif;
                                    if ($page != $_GET['page']) : ?>
                                        <li class="page-item" aria-current="page">
                                            <span class="page-link"><a class="text-decoration-none text-primary" href="?page=<?= $page ?>&filter=<?= $_GET['filter'] ?>"><?= $page ?></a></span>
                                        </li>
                        <?php endif;
                                endif;
                            endfor;
                        endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3" style="border-left:1px solid #bbc0c4;">
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
                <form action="../post/sign_up" method="POST" name="sign_up_form">
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
                <form action="../post/sign_in" method="POST" name="sign_in_form">
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