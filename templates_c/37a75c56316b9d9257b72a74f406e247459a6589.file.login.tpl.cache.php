<?php /* Smarty version Smarty-3.1-DEV, created on 2015-05-29 13:16:55
         compiled from "/Applications/XAMPP/htdocs/reader/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1228566708555657344eb7a6-96909021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37a75c56316b9d9257b72a74f406e247459a6589' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/login.tpl',
      1 => 1432037745,
      2 => 'file',
    ),
    '843c95a1efa1c83f84645f7f264efadf38cc8349' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/base.tpl',
      1 => 1432296710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1228566708555657344eb7a6-96909021',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5556573452c347_43263144',
  'variables' => 
  array (
    'reader_yrs' => 0,
    'reader_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5556573452c347_43263144')) {function content_5556573452c347_43263144($_smarty_tpl) {?>

<?php  $_config = new Smarty_Internal_Config("reader.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $_smarty_tpl->getConfigVariable('blogSubject');?>
">
    <meta name="author" content="<?php echo $_smarty_tpl->getConfigVariable('blogAuthor');?>
">


    <link rel="icon" href="images/TBA" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="http://localhost/reader/htdocs/css/styles.css">
<!-- 
    <script src="js/reader-ga.js"></script>

    <script src="js/reader-scripts.js"></script>
 -->
    <title><?php echo $_smarty_tpl->getConfigVariable('blogTitle');?>
</title>

</head>

<body>

    <!-- page -->
    <div id="page">

        <header><h1><?php echo $_smarty_tpl->getConfigVariable('blogTitle');?>
</h1></header>

        <!-- main -->
        <div id="main_content">

            

    <h2>Login</h2>


    <!-- error handling -->
    <?php if ($_smarty_tpl->tpl_vars['error']->value){?>

        <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>

    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['_GET']->value['expired'])){?>

        <p>Your session has expired. Please login again.</p>

    <?php }?>

    <!-- login form -->
    <form id="form2" method="post" action="">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"><br>
        <label for="pwd">Password: </label>
        <input type="password" name="pwd" id="pwd"><br>
        <input type="submit" name="login" id="login" value="Login">
    </form>



        </div><!-- main ends -->
    </div><!-- page ends -->

    <!-- footer -->
    <footer>
        <p>&copy;&nbsp;<?php echo $_smarty_tpl->tpl_vars['reader_yrs']->value;?>
 <?php echo $_smarty_tpl->getConfigVariable('blogAuthor');?>
 |
        today's date: <?php echo $_smarty_tpl->tpl_vars['reader_date']->value;?>
</p>
    </footer><!-- footer ends -->

</body>
</html>
<?php }} ?>