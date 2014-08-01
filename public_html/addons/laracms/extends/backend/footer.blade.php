<script>
    $(document).ready(function(){
        $(document).on('click', '.popup-link', function (e) {
            e.preventDefault();
            var me = $(this);

            $.get($(this).attr('href'),function(data){

                me.data('content',data);
                me.popover({
                    html: true,
                    template: '<div class="popover popover-bigger" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                });
                me.popover('show');
                $("#tabs").tabs();
            });

            return false;
        });

        $(document).on('change', '.auto-update-sort', function (e) {
            e.preventDefault();
            $.post('/backend/menuitemsort',{itemid: $(this).attr('id'),newsort: $(this).val()},function(data){
                notifyJs(data);
            })
            return false;

        });

        $(document).on('click', '.close-popup', function (e) {
            e.preventDefault();
            $("input[name='url']").val($(this).data('href'));
            $("input[name='link_text']").val($(this).html());
            $(this).parent().parent().parent().parent().parent().parent().parent().remove();
            return false;

        });

        $(".popup-link").popover();
    });
</script>