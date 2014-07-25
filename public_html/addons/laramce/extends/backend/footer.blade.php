{{ HTML::script('addons/laramce/tinymce/tinymce.min.js') }}
<script>
tinymce.init({
	selector: "textarea.rte",
	relative_urls: false,
	remove_script_host: false,
	plugins: [
	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	"save table contextmenu directionality emoticons template paste textcolor elfinder"
	],
	content_css: "/layouts/frontend/{{ Config::get('cms.theme') }}/css/main.css",
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
});
</script>