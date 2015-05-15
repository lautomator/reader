{* Smarty *}

{extends file="base.tpl"}

{block name=main}

    <h2>{#blogTitle#} entries</h2>


    <!-- error handling -->
    {if $error}

        <p>{$error}</p>

    {/if}

    {if isset($_GET['expired'])}

        <p>Your session has expired. Please login again.</p>

    {/if}

    <!-- login form -->
    <form id="form2" method="post" action="">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"><br>
        <label for="pwd">Password: </label>
        <input type="password" name="pwd" id="pwd"><br>
        <input type="submit" name="login" id="login" value="Login">
    </form>

{/block}
