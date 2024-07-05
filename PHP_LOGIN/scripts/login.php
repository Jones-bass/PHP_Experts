<?php

// verifica se existe erro na sessão
$erro = $_SESSION['erro'] ?? null;

// limpa a sessão
unset($_SESSION['erro']);

?>

<div class="containerLogin">

<div class="login-form">
    <div class="form-title">
        Login
    </div>
    <form action="?rota=login_submit" method="post">
        <div class="form-input">
            <label for="text_usuario">Usuário</label>
            <input type="text" name="text_usuario" required>
        </div>
        <div class="form-input">
            <label for="text_senha">Senha</label>
            <input type="password" name="text_senha" required>
        </div>
        <div class="form-button">
            <input type="submit" name="submit" value="Entrar" class="btn">
        </div>
    </form>

    
    <?php if (!empty($erro)) : ?>
        <div class="alert alert-danger mt-3 p-2 text-center">
            <?= $erro ?>
        </div>
    <?php endif; ?>
</div>
    
</div>
