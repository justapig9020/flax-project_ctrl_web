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
<script src="js/jquery-3.4.1.js"></script>
<script src="js/header.js"></script>
<script src="js/get_modify.js"></script>
<!--<script src="js/works.js"></script>-->

<main role="main" class="container">
<div class="row">
    <div class="col-2">
        <div class="btn-group-vertical btn-block" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-secondary">ALL</button>

            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Leader
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Professor
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop3" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Member
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-8">
        <div id="#">
        
        </div>
        
        <div id="#">
        
        </div>
    </div>
    
    <div class="col-2">
        
    </div>
    <div id="show_modify">
    </div>
    <div class="row">
		<div class="col-sm-4">
			<div class="list-group">
				<a href="" class="list-group-item list-group-item-action">123</a>
                </br>
            </div>
		</div>
	</div>	

</div>
</main><!-- /.container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>
