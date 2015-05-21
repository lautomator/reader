{* Smarty *}

{extends file="base.tpl"}

{block name=main}

    <h2>{#blogTitle#} entries</h2>

    <p>Welcome. There are: {$entries_read->num_rows} entries.</p>

    <!-- display the exisiting entries, if any -->
    {if $entries_read->num_rows == 0}
        <p>There are no entries.</p>

    {else}

        <!-- lists the entries -->
        <table>
            <tr>
                <th scope="col"><h3>Created</h3></th>
                <th scope="col"><h3>Title</h3></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

        {while $row = $entries_read->fetch_assoc()}

            <tr>
                <!-- created -->
                <td>
                    <p>{$row['date_created']}</p>
                </td>
                
                <!-- title -->
                <td>
                    <p>{substr($row['title'], 0, 10)} ...</p>
                </td>
                
                <!-- edit -->
                <td>
                    <p>
                    <a href="blog_update.php?article_id={$row['article_id']}">edit</a></p>
                </td>
                
                <!-- delete -->
                <td>
                    <a href="blog_delete.php?article_id={$row['article_id']}">delete</a></p>
                </td>
            </tr>

        {/while}

        </table>

    {/if}

        <!-- insert and view -->
        <form id="form1" action="" method="post">
            <p>
            <input type="submit" name="insert" value="Insert new entry"
                id="insert">
            <input type="submit" name="view" value="View blog"
                id="view">
            </p>
        </form>

{/block}
