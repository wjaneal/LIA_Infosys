<!DOCTYPE html>
<html lang=”en”>

<!DOCTYPE html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
<script>
$(document).on('submit', '.delete-form', function(){
    return confirm('Are you sure?');
});
</script>
<script>
jQuery('.delete-event').click(function(evnt) {
            var href = jQuery(this).attr('href');
            var message = jQuery(this).attr('data-content');
            var title = jQuery(this).attr('data-title');

            if (!jQuery('#dataConfirmModal').length) {
                jQuery('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">'+title+'</h3></div><div class="modal-body">'+message+'</div><div class="modal-footer"><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button><a class="btn btn-danger" id="dataConfirmOK">Yes</a></div></div>');
            } 

            jQuery('#dataConfirmModal').find('.modal-body').text(message);
            jQuery('#dataConfirmOK').attr('href', href);
            jQuery('#dataConfirmModal').modal({show:true});
})
</script>
<script>
function myFunction() {
    $("#h01").html("Hello jQuery")
}
$(document).ready(myFunction);
</script>
        <meta charset="UTF-8" />
        <link
            type="text/css"
            rel="stylesheet" 
            href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
        <title>
            {{GlobalHelpers::showGlobal(('schoolname'))}} International Department Information System
        </title>
    </head>
    <body>
        @include("header")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
        @include("footer")
    </body>
</html>
