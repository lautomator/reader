<?php /* Smarty version Smarty-3.1-DEV, created on 2015-05-15 16:32:37
         compiled from "/Applications/XAMPP/htdocs/reader/templates/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20869863735554f6be132380-91790347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '843c95a1efa1c83f84645f7f264efadf38cc8349' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/base.tpl',
      1 => 1431700356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20869863735554f6be132380-91790347',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5554f6be1c84f1_87557239',
  'variables' => 
  array (
    'entries_read' => 0,
    'reader_yrs' => 0,
    'reader_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554f6be1c84f1_87557239')) {function content_5554f6be1c84f1_87557239($_smarty_tpl) {?>

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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/reader-ga.js"></script>

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

            
            <p>There are: <?php echo $_smarty_tpl->tpl_vars['entries_read']->value->num_rows;?>
 entries.</p>

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