{foreach $modifies as $key=>$row}
{$key+1}-------------------
{if $key eq 4}
{$id = "lid"}
{else}
{$id = "id"}
{/if}
<div id={$id}>{$row["id"]}</div>
<div id="fid">{$row["file_id"]}</div>
<div id="uid">{$row["user_id"]}</div>
<div id="t">{$row["time"]}</div>
<div id="do">{$row["do"]}</div>
</br>
{/foreach}

