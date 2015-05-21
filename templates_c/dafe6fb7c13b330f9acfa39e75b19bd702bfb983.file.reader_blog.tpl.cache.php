<?php /* Smarty version Smarty-3.1-DEV, created on 2015-05-21 17:45:02
         compiled from "/Applications/XAMPP/htdocs/reader/templates/reader_blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1984604310555dfd7e727471-66866093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dafe6fb7c13b330f9acfa39e75b19bd702bfb983' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/reader_blog.tpl',
      1 => 1432223083,
      2 => 'file',
    ),
    '843c95a1efa1c83f84645f7f264efadf38cc8349' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/base.tpl',
      1 => 1431717746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1984604310555dfd7e727471-66866093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reader_yrs' => 0,
    'reader_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_555dfd7e77acf0_67485249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555dfd7e77acf0_67485249')) {function content_555dfd7e77acf0_67485249($_smarty_tpl) {?>

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

            

    <h2><?php echo $_smarty_tpl->getConfigVariable('blogTitle');?>
 entries</h2>

    <p>Welcome. There are: <?php echo $_smarty_tpl->tpl_vars['entries_read']->value->num_rows;?>
 entries.</p>

    <!-- display the exisiting entries, if any -->
    <?php if ($_smarty_tpl->tpl_vars['entries_read']->value->num_rows==0){?>
        <p>There are no entries. Login to make an entry.</p>

    <?php }else{ ?>

        <?php if (!isset($_smarty_tpl->tpl_vars['row'])) $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable(null);while ($_smarty_tpl->tpl_vars['row']->value = $_smarty_tpl->tpl_vars['entries_read']->value->fetch_assoc()){?>

            <h3 id="<?php echo $_smarty_tpl->tpl_vars['row']->value['article_id'];?>
">

            <p><?php echo $_smarty_tpl->tpl_vars['row']->value['date_created'];?>
 &mdash; <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</p>

            <p><?php echo formatParagraphs($_smarty_tpl->tpl_vars['row']->value['article']);?>
</p>

            <?php if ($_smarty_tpl->tpl_vars['row']->value['image_id']!=null){?>

                <img src="img/<?php echo $_smarty_tpl->tpl_vars['row']->value['filename'];?>
" alt="$row['caption']}" />

            <?php }?>

        <?php }?>

    <?php }?>

    <!-- post and list form -->
    <form id="form1" action="" method="post">
        <!-- post a new entry -->
        <p>
        <input type="submit" name="insert" value="Insert new entry"
            id="insert">
        <!-- list existing entries -->
        <input type="submit" name="list"
            value="List existing entries" id="list">
        </p>
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