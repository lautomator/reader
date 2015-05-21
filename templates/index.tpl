{* Smarty *}

{extends file="base.tpl"}

{block name=main}

    <h2>{#blogTitle#} entries</h2>

    <p>There are: {$entries_read->num_rows} entries.</p>

    <!-- display the exisiting entries, if any -->
    {if $entries_read->num_rows == 0}
        <p>There are no entries. Login to make an entry.</p>

    {else}

        {while $row = $entries_read->fetch_assoc()}
            <p>{$row['date_created']} &mdash; {$row['title']}</p>

            <p>{formatParagraphs($row['article'])}</p>

            {if $row['image_id'] != null}

                <img src="img/{$row['filename']}" alt="$row['caption']}" />

            {/if}

        {/while}

    {/if}

    <!-- login -->
    <form id="form1" action="" method="post">
        <p><input type="submit" name="login" value="Login" id="login"></p>
    </form>

{/block}
