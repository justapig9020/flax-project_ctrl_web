{config_load file="normal.conf" section="overView"}
<html>
<head>
    <title>{#title#}_{#page#}</title>
    {literal}
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/normal.css"/>
    {/literal}
</head>
<body>
<script src="jquery-3.4.1.js"></script>
<script src="js/header.js"></script>
<script src="js/works.js"></script>

<main role="main" class="container">
<div class="row">
    <div class="list-group">
		<a href="./project.php?pid={$row["pid"]}" class="list-group-item list-group-item-action">{$row["oid"]} / {$row["pname"]}</a>
    </div>
</div>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>
