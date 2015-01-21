<!DOCTYPE html>
<html lang=”en”>
    <head>
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
        @include("header1")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
    </body>
</html>
