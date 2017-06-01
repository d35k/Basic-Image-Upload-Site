<?php require 'static/header.php';?>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo asset_url('css/materialize.min.css')?>" type="text/css" rel="stylesheet">

<div class="section no-pad-bot" style="width: 50%;margin: 0 auto;">
    <div>
        <div class="module form-module">
            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                <div class="tooltip"></div>
            </div>
            <div class="form" action="<?php echo site_url('uyeOl')?>">
                <h2>Üye olun!</h2>
                <form method="post">
                    <input type="text" name="userName" placeholder="Kullanıcı Adı" required/>
                    <input type="password" name="password" placeholder="Şifre" required/>
                    <button type="submit">Üye Ol</button>
                </form>
            </div>
            <div class="cta"><a href="<?php echo site_url('uyeGiris');?>">Zaten üye misiniz? Tıklayın ve giriş yapın!</a></div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://codepen.io/andytran/pen/vLmRVp.js'></script>
        <script src="<?php asset_url('js/index.js'); ?>"></script>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<?php require 'static/footer.php'?>

