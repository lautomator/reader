<?php /* Smarty version Smarty-3.1-DEV, created on 2015-05-22 13:39:54
         compiled from "/Applications/XAMPP/htdocs/reader/templates/blog_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1629662306555e029b456900-01156705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f402030da54b30db9907a072235c3bc9db791fe' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/blog_list.tpl',
      1 => 1432291953,
      2 => 'file',
    ),
    '843c95a1efa1c83f84645f7f264efadf38cc8349' => 
    array (
      0 => '/Applications/XAMPP/htdocs/reader/templates/base.tpl',
      1 => 1432293951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1629662306555e029b456900-01156705',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_555e029b49b570_76626800',
  'variables' => 
  array (
    'reader_yrs' => 0,
    'reader_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e029b49b570_76626800')) {function content_555e029b49b570_76626800($_smarty_tpl) {?>

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

            

    <h2><?php echo $_smarty_tpl->getConfigVariable('blogTitle');?>
 entries</h2>

    <p>Welcome. There are: <?php echo $_smarty_tpl->tpl_vars['entries_read']->value->num_rows;?>
 entries.</p>

    <!-- display the exisiting entries, if any -->
    <?php if ($_smarty_tpl->tpl_vars['entries_read']->value->num_rows==0){?>
        <p>There are no entries.</p>

    <?php }else{ ?>

        <!-- lists the entries -->
        <table>
            <tr>
                <th scope="col"><h3>Created</h3></th>
                <th scope="col"><h3>Title</h3></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

        <?php if (!isset($_smarty_tpl->tpl_vars['row'])) $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable(null);while ($_smarty_tpl->tpl_vars['row']->value = $_smarty_tpl->tpl_vars['entries_read']->value->fetch_assoc()){?>

            <tr>
                <!-- created -->
                <td>
                    <p><?php echo $_smarty_tpl->tpl_vars['row']->value['date_created'];?>
</p>
                </td>
                
                <!-- title -->
                <td>
                    <p><?php echo substr($_smarty_tpl->tpl_vars['row']->value['title'],0,10);?>
 ...</p>
                </td>
                
                <!-- edit -->
                <td>
                    <p>
                    <a href="blog_update.php?article_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['article_id'];?>
">edit</a></p>
                </td>
                
                <!-- delete -->
                <td>
                    <a href="blog_delete.php?article_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['article_id'];?>
">delete</a></p>
                </td>
            </tr>

        <?php }?>

        </table>

    <?php }?>

        <!-- insert and view -->
        <form id="form1" action="" method="post">
            <p>
            <input type="submit" name="insert" value="Insert new entry"
                id="insert">
            <input type="submit" name="view" value="View blog"
                id="view">
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