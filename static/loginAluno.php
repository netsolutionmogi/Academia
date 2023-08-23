<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gerenciador Academia &amp; Dashboard para freelancers">
    <meta name="author" content="Alexandre Seixas">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <script src="https://kit.fontawesome.com/1f76937ee1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <title>Gerenciador Academia para freelancers</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
    .cookieConsentContainer {
        z-index: 999;
        width: 350px;
        min-height: 20px;
        box-sizing: border-box;
        padding: 30px 30px 30px 30px;
        background: #232323;
        overflow: hidden;
        position: fixed;
        bottom: 30px;
        right: 30px;
        display: none
    }

    .cookieConsentContainer .cookieTitle a {
        font-family: OpenSans, arial, sans-serif;
        color: #fff;
        font-size: 22px;
        line-height: 20px;
        display: block
    }

    .cookieConsentContainer .cookieDesc p {
        margin: 0;
        padding: 0;
        font-family: OpenSans, arial, sans-serif;
        color: #fff;
        font-size: 13px;
        line-height: 20px;
        display: block;
        margin-top: 10px
    }

    .cookieConsentContainer .cookieDesc a {
        font-family: OpenSans, arial, sans-serif;
        color: #fff;
        text-decoration: underline
    }

    .cookieConsentContainer .cookieButton a {
        display: inline-block;
        font-family: OpenSans, arial, sans-serif;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        margin-top: 14px;
        background: #258932;
        box-sizing: border-box;
        padding: 15px 24px;
        text-align: center;
        transition: background .3s
    }

    .cookieConsentContainer .cookieButton a:hover {
        cursor: pointer;
        background: #3e9b67
    }

    @media (max-width:980px) {
        .cookieConsentContainer {
            bottom: 0 !important;
            left: 0 !important;
            width: 100% !important
        }
    }
    </style>

</head>

<body>
    <?php
 ob_start();
 session_start();
?>

    <div class="wrapper">

        <div class="d-flex w-100 vh-100 align-items-center justify-content-center">

            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body mt-5" style='margin-top: -50px; padding: 20px;'>
                    <form action="verifica_Aluno.php" method="post" id="login-form">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="login" required placeholder="login">

                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="senha" id="senha" required
                                placeholder="Senha">
                            <div class="input-group-append">
                                <div class="input-group-text">

                                </div>
                                <button class="button btn sm btn-light" type="button" onclick="mostrarSenha()">Mostrar
                                    Senha</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">

                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-lg btn-primary"><b>Entrar</b></button>
                            </div><br><br>


                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="text-center text-danger">
                        <?php if (isset($_SESSION['loginErro'])){
                            echo $_SESSION['loginErro'];
                            unset($_SESSION['loginErro']);
                    }?>
                    </p>
                    <hr>
                    <center>
                        <p>Não Possui cadastro ? <a href="Registrar_Aluno.php" type="role">Primeiro acesso</a></p>

                    </center>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>

    <script>
    function mostrarSenha() {
        var tipo = document.getElementById("senha");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
    </script>


    <script>
    var purecookieTitle = "Cookies.",
        purecookieDesc = "Este sistema utiliza Cookies, Você automaticamente está aceitando os termos de uso.",
        purecookieLink = '<a href="privacy-policy.html" target="_blank">O que significa?</a>',
        purecookieButton = "Entendi";

    function pureFadeIn(e, o) {
        var i = document.getElementById(e);
        i.style.opacity = 0, i.style.display = o || "block",
            function e() {
                var o = parseFloat(i.style.opacity);
                (o += .02) > 1 || (i.style.opacity = o, requestAnimationFrame(e))
            }()
    }

    function pureFadeOut(e) {
        var o = document.getElementById(e);
        o.style.opacity = 1,
            function e() {
                (o.style.opacity -= .02) < 0 ? o.style.display = "none" : requestAnimationFrame(e)
            }()
    }

    function setCookie(e, o, i) {
        var t = "";
        if (i) {
            var n = new Date;
            n.setTime(n.getTime() + 24 * i * 60 * 60 * 1e3), t = "; expires=" + n.toUTCString()
        }
        document.cookie = e + "=" + (o || "") + t + "; path=/"
    }

    function getCookie(e) {
        for (var o = e + "=", i = document.cookie.split(";"), t = 0; t < i.length; t++) {
            for (var n = i[t];
                " " == n.charAt(0);) n = n.substring(1, n.length);
            if (0 == n.indexOf(o)) return n.substring(o.length, n.length)
        }
        return null
    }

    function eraseCookie(e) {
        document.cookie = e + "=; Max-Age=-99999999;"
    }

    function cookieConsent() {
        getCookie("purecookieDismiss") || (document.body.innerHTML +=
            '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' +
            purecookieTitle + '</a></div><div class="cookieDesc"><p>' + purecookieDesc + " " + purecookieLink +
            '</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">' + purecookieButton +
            "</a></div></div>", pureFadeIn("cookieConsentContainer"))
    }

    function purecookieDismiss() {
        setCookie("purecookieDismiss", "1", 7), pureFadeOut("cookieConsentContainer")
    }
    window.onload = function() {
        cookieConsent();
        window.reload();
    };
    </script>
</body>

</html>