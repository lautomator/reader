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

            <p>{$row['date_created']} &mdash; {$row['title']}</p>

            {if $row['article']|count_words > 99}

                <p>
                    {summaryText($row['article'])}
                    <a href="reader_blog.php#{$row['article_id']}">more</a>
                </p>

            {else}

                <p>{formatParagraphs($row['article'])}</p>

                {if $row['image_id'] != null}

                    <img src="img/{$row['filename']}" alt="$row['caption']}" />

                {/if}

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

    <!-- logout form -->
    <form id="logoutForm" method="post" action="">
        <input name="logout" type="submit" id="logout"
        value="Logout">
    </form>

{/block}
