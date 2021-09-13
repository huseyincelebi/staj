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
                            <li><a class="dropdown-item" href="../..">Anasayfa</a></li>
                            <li><a class="dropdown-item" href="../../questions">Sorular</a></li>
                            <li><a class="dropdown-item" href="../../tags">Taglar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 d-flex">
                    <a class="navbar-brand" href="../..">
                        Sor<mark style="background-color:white;color:#ef476f;">&</mark>Yanıtla
                    </a>
                </div>
            </div>
            <div class="row w-50">
                <div class="col">
                    <form action="../../search" method="GET" name="ask_question_form">
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
            <div class="col-md-7">
                <div class="row">
                    <div class="col">
                        <a class="lead fs-3 text-decoration-none text-dark"><strong><?= $question['title'] ?></strong></a>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col">
                        <a class="lead fs-6 text-decoration-none text-dark"><strong><?= $time ?></strong></a>
                    </div>
                    <hr class="my-2">
                </div>
                <div class="row my-2" style="min-height:125px;">
                    <div class="col mb-4">
                        <a class="lead fs-6 text-decoration-none text-dark" style="overflow-wrap: break-word;word-wrap: break-word;hyphens: auto;"><strong><?= $question['content'] ?></strong></a>
                    </div>
                    <div class="d-flex mt-4 justify-content-between">
                        <div>
                            <a class="lead fs-6 text-decoration-none text-dark"><strong>Tag :</strong></a>
                            <?php foreach ($question_tags as $question_tag) : ?>
                                <span class="badge bg-secondary"><?= $tags[array_search($question_tag['tag_id'], array_column($tags, 'id'))]['name']; ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a class="lead fs-6 text-decoration-none text-dark text-decoration-none" href="../../users/<?= $users[array_search($question['user_id'], array_column($users, 'id'))]['username']; ?>"><strong><?= $users[array_search($question['user_id'], array_column($users, 'id'))]['username']; ?></strong></a>
                    </div>
                    <hr class="my-3">
                </div>
                <?php foreach ($answers as $answer) : ?>
                    <div class="row my-2">
                        <div class="col">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start" answer_id=<?= $answer['id'] ?> question_id=<?= $question['id'] ?>>
                                    <i class="fas fa-chevron-up mx-auto like fs-4" data-bs-toggle="modal" data-bs-target="#sign_in_modal" type="button" id="like<?= $answer['id'] ?>"></i>
                                    <a class="lead text-decoration-none text-dark mx-auto fs-4"><strong id="rate_point<?= $answer['id'] ?>"><?= $answer['rate_point'] ?></strong></a>
                                    <i class="fas fa-chevron-down mx-auto dislike fs-4" data-bs-toggle="modal" data-bs-target="#sign_in_modal" type="button" id="dislike<?= $answer['id'] ?>"></i>
                                    <?php if ($answer['solution'] == 1) : ?>
                                        <hr><i class="fas fa-user-check mx-auto fs-6" id="solution<?= $answer['id'] ?>" style="color:#de1dde;"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="col-11" style="min-height:125px;">
                                    <a class="lead fs-6 text-decoration-none text-dark" style="overflow-wrap: break-word;word-wrap: break-word;hyphens: auto;"><strong><?= $answer['content'] ?></strong></a>
                                </div>
                                <a class="lead fs-6 text-decoration-none text-dark d-flex mt-2 justify-content-end" href="../../users/<?= $users[array_search($answer['user_id'], array_column($users, 'id'))]['username']; ?>"><strong><?= $users[array_search($answer['user_id'], array_column($users, 'id'))]['username']; ?></strong></a>
                            </div>
                            <hr class="my-3">
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row my-2">
                    <div class="col">
                        <p class="lead fs-4 text-decoration-none text-dark"><strong>Senin Yanıtın</strong></p>
                        <div class="input-group mb-1" style="border:1px solid #ced4da;min-height:20px;">
                            <input type="file" id="t_image" onchange="add_image_answer()" accept="image/*" style="display: none;" />
                            <button class="btn" type="button" onclick="document.getElementById('t_image').click();">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </button>
                        </div>
                        <div class="input-group p-2" id="t_editor_answer" contentEditable="true" style="display: inline-block;border:1px solid #ced4da;min-height:240px;resize: vertical;overflow: auto;">

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#sign_in_modal" class="btn btn-primary my-2 w-25" name="answer_question">Yanıtla</button>
                        </div>
                    </div>
                </div>
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
                <form action="../../post/sign_up" method="POST" name="sign_up_form">
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
                <form action="../../post/sign_in" method="POST" name="sign_in_form">
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