{* Smarty *}

{extends file="base.tpl"}

{block name=main}

    <h2>{#blogTitle#} entries</h2>

    <p>Welcome. There are: {$entries_read->num_rows} entries.</p>

    <!-- display the exisiting entries, if any -->
    {if $entries_read->num_rows == 0}
        <p>There are no entries. Login to make an entry.</p>

    {else}

        {while $row = $entries_read->fetch_assoc()}

            <h3 id="{$row['article_id']}">

            <p>{$row['date_created']} &mdash; {$row['title']}</p>

            <p>{formatParagraphs($row['article'])}</p>

            {if $row['image_id'] != null}

                <img src="img/{$row['filename']}" alt="$row['caption']}" />

            {/if}

        {/while}

    {/if}

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

{/block}
