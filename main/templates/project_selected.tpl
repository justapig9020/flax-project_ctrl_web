{config_load file="normal.conf" section="project"}
<html>
<head>
	<title>{#title#}_{#page#}</title>
   {literal}
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>
	<link rel="stylesheet" type="text/css" href="./css/project.css"/>
   {/literal}
</head>
<body>
<header>
</header>
<script src="js/header.js"></script>
<main role="main" class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm">
                <p class="h1">{foreach $mems as $row}{if $row["status"] eq 1}{$row["uid"]}{/if}{/foreach}/{$pname}</p>
            </div>
        </div>
    </div>
    </br>
<div class="row">
    <div class="col-2">
        <div class="btn-group-vertical">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#">新增檔案</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_work">新增工作</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Mem">新增成員</button>
        </div>
        <ul class="list-group list-group-flush">
            {foreach $mems as $row}
                {if $row["status"] eq "1"}
                    <li class="list-group-item list-group-item-warning">{$row["uid"]}</li>
                {/if}
                {if $row["status"] eq "2"}
                    <li class="list-group-item list-group-item-info">{$row["uid"]}</li>
                {/if}
                {if $row["status"] eq "0"}
                    <li class="list-group-item">{$row["uid"]}</li>
                {/if}
            {/foreach}
        </ul>
    </div>
    
    <div class="col-8">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">wid</th>
                    <th scope="col">fname</th>
                    <th scope="col">ftime</th>
                    <th scope="col">fintr</th>
                </tr>
            </thead>
            <tbody>
            {foreach $works as $row}
                <tr>
                    <th scope="row">{$row["wid"]}</th>
                        <td>{$row["fname"]}</td>
                        <td>{$row["ftime"]}</td>
                        <td id="fintr">{$row["fintr"]}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    
    <div class="col-2">
        <ul class="list-group list-group-flush">
        <b><li class="list-group-item list-group-item-warning text-center">擁有者</li></b>
            {foreach $mems as $row}
                {if $row["status"] eq "1"}
                    <li class="list-group-item">{$row["uid"]}</li>
                {/if}
            {/foreach}
        </ul>
        <ul class="list-group list-group-flush">
            <b><li class="list-group-item list-group-item-info text-center">Professor</li></b>
            {foreach $mems as $row}
                {if $row["status"] eq "2"}
                    <li class="list-group-item">{$row["uid"]}</li>
                {/if}
            {/foreach}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Tea">新增老師</button>
        </ul>
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
                   <input class="form-control" type="text" name="wintr" placeholder="請輸入工作簡介" required="">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<footer>
</footer>
</body>
</html>
