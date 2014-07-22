<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{Config::get('cms.title')}}</title>
	<meta name="description" content="description">
	<meta name="author" content="DevOOPS">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{ HTML::style('layouts/backend/plugins/bootstrap/bootstrap.css') }}
	{{ HTML::style('layouts/backend/plugins/jquery-ui/jquery-ui.min.css') }}
	{{ HTML::style('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Righteous') }}
	{{ HTML::style('layouts/backend/plugins/fancybox/jquery.fancybox.css') }}
	{{ HTML::style('layouts/backend/plugins/fullcalendar/fullcalendar.css') }}
	{{ HTML::style('layouts/backend/plugins/xcharts/xcharts.min.css') }}
	{{ HTML::style('layouts/backend/plugins/select2/select2.css') }}
	{{ HTML::style('layouts/backend/css/style.css') }}
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
	<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
{{ $navbar }}
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
                <li>
                    <a href="{{ url('backend/') }}" class="active ajax-link">
                        <i class="fa fa-dashboard"></i>
                        <span class="hidden-xs">{{ Lang::get('strings.dashboard') }}</span>
                    </a>
                </li>
            {{ $sidebar }}
            {{$sidebarmenu}}
            </ul>
        </div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			{{ $content }}
		</div>
		<!--End Content-->
	</div>
</div>
{{ HTML::script('layouts/backend/plugins/jquery/jquery-2.1.0.min.js') }}
{{ HTML::script('layouts/backend/plugins/jquery-ui/jquery-ui.min.js') }}
{{ HTML::script('layouts/backend/plugins/bootstrap/bootstrap.min.js') }}
{{ HTML::script('layouts/backend/plugins/justified-gallery/jquery.justifiedgallery.min.js') }}
{{ HTML::script('layouts/backend/plugins/tinymce/tinymce.min.js') }}
{{ HTML::script('layouts/backend/plugins/tinymce/jquery.tinymce.min.js') }}
</body>
</html>
