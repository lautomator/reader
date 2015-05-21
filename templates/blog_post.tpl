{* Smarty *}

{extends file="base.tpl"}

{block name=main}

    <h3>Insert a new blog entry</h3>

    {if isset($err)}
        <p>{$err}</p>
    {/if}

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
            <!-- <input type="submit" name="clear" value="Clear"
                id="clear"> -->
        </p>
    </form>

{/block}
