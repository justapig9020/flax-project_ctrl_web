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
                <p class="h1">{$prjs}</p>
            </div>
        </div>
    </div>
    </br>
<div class="row">
    <div class="col-2">
        <ul class="list-group list-group-flush">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Mem">新增成員</button>
        <div class="list-group">
            {foreach $mems as $row}
                <li class="list-group-item">{$row["uid"]}</li>
                <li class="list-group-item">123</li>
            {/foreach}
        </div>
    </div>
    <div class="col-8">
        第一行文字<br>第二行文字<br>第三行文字
    </div>
    <div class="col-2">
        <ul class="list-group list-group-flush">
            <b><li class="list-group-item list-group-item-warning text-center">擁有者</li></b>
            <li class="list-group-item">123456</li>
        </ul>
        <ul class="list-group list-group-flush">
            <b><li class="list-group-item list-group-item-info text-center">Teacher</li></b>
            <li class="list-group-item">654321</li>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Tea">新增老師</button>
        </ul>    
    </div>
</div>
<!-- Modal -->
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
<script src="../js/bootstrap.bundle.js"></script>
<footer>
</footer>
</body>
</html>
