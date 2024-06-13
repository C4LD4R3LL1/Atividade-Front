<?php
date_default_timezone_set('America/Sao_Paulo');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<html>
<?php
include ("view/comum/head.php");
?>

<body>
    <?php
    if (isset($_SESSION['token'])) {
        ?>
        <div class="container p-2">
            <div class="row p-2 m-2">
                <div class="col-4">
                </div>
                <div class="col-4">
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-primary logoff">Sair</button>
                </div>
            </div>
        </div>
        <?php
    } else {
        include ("view/login.php");
    }
    ?>
    <?php
    include ("view/comum/footer.php");
    ?>
    <?php
    if (!isset($_SESSION['token'])) {
        ?>
        <script src="login.js"></script>
        <?php
    }
    ?>
</body>

</html>