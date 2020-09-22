<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'configuracoes';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">
        <h1>Configurações</h1>

            <?php if(!empty($_SESSION['flash'])): ?>
                <?=$_SESSION['flash'];?>
                <?=$_SESSION['flash'] = '';?>
            <?php endif; ?>

        <form method="POST" class="config-form" enctype="multipart/form-data" action="configuracoes_action.php">
            <label>
                Novo Avatar:<br/>
                <input type="file" name="avatar"/><br/>
                <img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" class="mini"/>
            </label>

            <label>
                Nova Capa:<br/>
                <input type="file" name="cover"/><br/>
                <img src="<?=$base;?>/media/covers/<?=$userInfo->cover;?>" class="mini"/>
            </label>

            <hr class="bugfix"/>

            <label>
                Nome Completo: <span>*</span><br/> 
                <input type="text" name="name" value="<?=$userInfo->name;?>"/>
            </label>            
            <label>Email: <span>*</span><br/>
            <input type="email" name="email" value="<?=$userInfo->email;?>" />
            </label>
            <label>Data de Nascimento<br/>
            <input type="date" name="birthdate" value="<?=$userInfo->birthdate;?>" />
            </label>
            <label>Cidade<br/>
            <input type="text" name="city" value="<?=$userInfo->city;?>" />
            </label>
            <label>Trabalho:<br/> 
            <input type="text" name="work" value="<?=$userInfo->work;?>" />
            </label>            
            <hr/>
            <label>Nova Senha: <br/>
            <input type="password" name="password" />
            </label>
            <label>Confirmar Nova senha:<br/> 
            <input type="password" name="password_confirmation" />
            </label>
            <button class="button">Salvar</button>
        </form>
</section>

<?php
require 'partials/footer.php';
?>