{foreach $mems as $row}
    {if $row["status"] eq "1"}
        <li class="list-group-item list-group-item-warning" title="組長" id="mem_list_lea">{$row["uid"]}</li>
    {/if}
        {if $row["status"] eq "2"}
    <li class="list-group-item list-group-item-info" title="指導" id="mem_list_mem" >{$row["uid"]}</li>
        {/if}
    {if $row["status"] eq "0"}
        <li class="list-group-item" title="成員" id="mem_list_mem" >{$row["uid"]}</li>
    {/if}
{/foreach}

