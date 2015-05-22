<?php /* Smarty version Smarty-3.1-DEV, created on 2015-05-22 13:45:24
         compiled from "/Applications/XAMPP/htdocs/reader/templates/blog_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109197042555e422de18865-54014017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2499cbf47ea5bb88b15556c72eda57caa4eb3fc4' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/blog_post.tpl',
      1 => 1432294925,
      2 => 'file',
    ),
    '843c95a1efa1c83f84645f7f264efadf38cc8349' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/base.tpl',
      1 => 1432293951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109197042555e422de18865-54014017',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_555e422de58af9_80918074',
  'variables' => 
  array (
    'reader_yrs' => 0,
    'reader_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e422de58af9_80918074')) {function content_555e422de58af9_80918074($_smarty_tpl) {?>

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
    <script src="js/reader-ga.js"></script>
    <script src="js/reader-scripts.js"></script>

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

            

    <h3>Insert a new blog entry</h3>

    <?php if (isset($_smarty_tpl->tpl_vars['err']->value)){?>
        <p><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</p>
    <?php }?>

    <!-- insert post form -->
    <form id="form1" action="" method="post">
        <p>
            <label for="title">Title:</label><br>
            <input name="title" type="text" class="formbox"
                id="title">
        </p>
        <p>
            <label for="article">Article:</label><br>
            <textarea name="article" cols="60" rows="8"
                class="formbox" id="article"></textarea>
        </p>
        <p>
            <!-- insert the entry -->
            <input type="submit" name="insert" value="Post"
                id="insert">
            <!-- list existing entries -->
            <input type="submit" name="list" value="Cancel"
                id="list">
            <!-- clear the form -->
            <input type="submit" name="clear" value="Clear"
                id="clear">
        </p>
    </form>

    <!-- clear the form -->
    <script type="text/javascript">

        var clearForm = document.getElementById('clear');
        clearForm.onclick = clearForm.reset();

    </script>



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