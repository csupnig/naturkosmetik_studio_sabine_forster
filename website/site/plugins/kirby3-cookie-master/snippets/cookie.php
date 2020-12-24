<div id="cookie_banner-wrapper" class="darkGreenBackground fixed white padding">
    <div class="cookie_container">
        <span class="large"><?= $site->cookieHeadline()->html(); ?></span>
        <span class="cookie_message smallTopMargin"><?= $site->cookieText()->kirbyText(); ?></span>
        <?php if ($site->cookiePolicyFile()->isNotempty()) { ?>
                <span class="extraSmall"><a href="<?= $site->cookiePolicyFile()->toFile()->url() ?>">Zu den Cookie Richtlinien</a></span><br/>
            <?php } else if ($site->cookiePolicyPage()->isNotEmpty()) { ?>
                <span class="extraSmall"><a href="<?= $site->cookiePolicyPage()->toPage()->url() ?>">Zu den Cookie Richtlinien</a></span><br/>
            <?php } ?>
        <div class="topMargin">
            <button class="cookie_btn cookie_btn_accept_all white floatRight" onclick="closeCookie()"><span class="small alwaysUnderline">Cookies akzeptieren</span></button>
            <button class="cookie_btn_deny_all white floatLeft" onclick="denyCookie()"><span class="small">x</span></button>
        </div>
    </div>
</div>

<script>
    function closeCookie() {
        document.cookie = "cookie-note=1;path=/;max-age=864000", banner.style.display = "none";
        window.location.reload();
    }
    function denyCookie() {
        document.cookie = "cookie-note=0;path=/;max-age=864000", banner.style.display = "none";
    }

    var banner = document.getElementById("cookie_banner-wrapper");
    -1 !== document.cookie.indexOf("cookie-note=1") && (banner.style.display = "none");
</script>