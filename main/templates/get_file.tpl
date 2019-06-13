<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">作者</th>
            <th scope="col">名稱</th>
            <th scope="col">創建時間</th>
            <th scope="col">權限</th>
        </tr>
    </thead>
    <tbody>
        {foreach $files as $row}
        <tr>
            <th scope="row">{$row["oid"]}</th>
            <th scope="row">{$row["fname"]}</th>
            <th scope="row">{$row["ftime"]}</th>
            <th scope="row">{$row["fpre"]}</th>
        </tr>
        {/foreach}
        {if !$files}
            尚無檔案
        {/if}
    </tbody>
</table>


