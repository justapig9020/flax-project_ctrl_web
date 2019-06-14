{config_load file="normal.conf" section="project"}
<html>
<head>
	<title>{#title#}_{#page#}</title>
   {literal}
    <link rel="stylesheet" type="text/css" href="css/show_work.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>
	<link rel="stylesheet" type="text/css" href="css/project.css"/>
   {/literal}
</head>
<body>
<header>
</header>
<script src="js/header.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
var pid = {$pid};
</script>
<script src="js/show_work.js"></script>
<script src="js/project_selected_show_board.js"></script>
{literal}
<script src="js/show_mem.js"></script>
{/literal}
<main role="main" class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm">
                <p class="h1" id="proj_path">
                {$is_own = 0}
                {foreach $mems as $row}
                    {if $row["status"] eq 1}
                        {if $row["uid"] eq $user_id}
                            {$is_own = 1}
                        {/if}
                        {$row["uid"]}/{$pname}
                    {/if}
                {/foreach}
                </p>
            </div>
        </div>
    </div>
    </br>

    <div class="row"> 
    <div class="col-2">
    </br>
    </br>
        <ul class="list-group">
        {*
        <li class="list-group-item list-group-item-warning text-center"><b>擁有者</b></li>
            {foreach $mems as $row}
                {if $row["status"] eq "1"}
                    <li class="list-group-item">{$row["uid"]}</li>
                {/if}
            {/foreach}
            <li class="list-group-item list-group-item-info text-center"><b>Professor</b></li>
            *}
            {$pro_ex = 0}
            {foreach $mems as $row}
                {if $row["status"] eq "2"}
                    {$pro_ex = 1}
                    <!--<li class="list-group-item">{$row["uid"]}</li>-->
                {/if}
            {/foreach}
            
            {if $is_own eq 1}
            <div class="btn-group dropleft" role="group">
                <button id="btnGroupDrop3" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    成員
                </button>
                <div id="mem_add_del_btn">
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_Mem">新增成員</button>
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#" id="d_mem">刪除成員</button>
                    {if $pro_ex eq 0 && $is_own eq 1}    
                        <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_Tea">新增指導員</button>
                    {/if}
                </div>
                </div>
            </div>
            {else}
                成員
            {/if}
            <!--<li class="list-group-item list-group-item-dark text-center" id="mem_title"><b>O成員</b></li>-->
            <ul class="list-group">
                <div id="mem_list">
                </div>
                <div id="mem_loading">
                </div>
            </ul>
        </ul>
    </div>

    <div class="col-8">
        <div class="container">
            <div class="btn-group col-4" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-dark" id="show_files_button">顯示檔案</button>
                <button type="button" class="btn btn-dark" id="show_works_button">顯示工作</button>
            </div>
        </div>
        <div>
            <div id="loading"></div>
            <div id="show_works">
                <div style="background-color:orange;">
                    <h1 class="green" id="gantt-month">月份</h1>
                    <h2 class="green small" id="gantt-year">年份</h2>
                    <div class="body">
                        <div class="lightgrey body-list">
                        <ul>
                            <li>一</li>
                            <li>二</li>
                            <li>三</li>
                            <li>四</li>
                            <li>五</li>
                            <li>六</li>
                            <li>日</li>
                        </ul>
                        </div>
                        <div class="darkgrey body-list">
                        <ul id="show_works_days"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="show_files"></div>
        </div>
    </div>
    
    <div class="col-2">
    </br>
    </br>
        <div class="btn-group-vertical">
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    檔案
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_file">新增檔案</button>
                     <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#">刪除檔案</button>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop2" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    工作
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_work">新增工作</button>
                     <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#">刪除工作</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new_file -->
<div class="modal fade" id="new_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增工作</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-new_file" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <!-- 限制上傳檔案的最大值 -->
                <div id="file_list">
                    <!-- accept 限制上傳檔案類型。多檔案上傳 name 的屬性值須定義為 array -->
                    <input type="file" name="myFile[]" id="file_array" style="display: block;margin-bottom: 5px;">
                    <!-- 使用 html 5 實現單一上傳框可多選檔案方式，須新增 multiple 元素 -->
                    <!-- <input type="file" name="myFile[]" id="" accept="image/jpeg,image/jpg,image/gif,image/png" multiple> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <input type="button" class="btn btn-secondary" id="more_files" value="更多檔案">
                <input type="submit" class="btn btn-primary" value="上傳檔案">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- new_work -->
<div class="modal fade" id="new_work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增工作</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-new_work" id="new_work" name="new_work" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="wname" placeholder="請輸入工作名稱" autofocus="" required="">
                   <input class="form-control" type="date" name="wstart" placeholder="請輸入開始工作日期" required="">
                   <input class="form-control" type="date" name="wend" placeholder="請輸入結束工作日期" required="">
                   <input class="form-control" type="text" name="wintr" placeholder="請輸入工作簡介">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增工作"></input>
                </div>
            </form>            
        </div>
    </div>
</div>

<!-- new_Mem -->
<div class="modal fade" id="new_Mem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增成員</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-project_selected" id="project_selected" name="form1" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="mid" placeholder="請輸入成員學號" autofocus="" required="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增成員"></input>
                </div>
            </form>            
        </div>
    </div>
</div>

<!-- new_Tea -->
<div class="modal fade" id="new_Tea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增老師</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-project_selected" id="project_selected" name="form1" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="tid" placeholder="請輸入老師代號" autofocus="" required="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增老師"></input>
                </div>
            </form>            
        </div>
    </div>
</div>
</main><!-- /.container -->
<footer>
</footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
