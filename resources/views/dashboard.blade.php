<!DOCTYPE html>
<html lang="en">
    <head>
        @include("Layouts.head_site")
        <title>Dashboard | Assistance Bot</title>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="header">
                @include("Layouts.top_navbar")
            </div>
            <div class="sidebar" id="sidebar">
                @include("Layouts.left_navbar")
            </div>
            <div class="page-wrapper">
                <div class="content container-fluid">
               
                </div>
                
            </div>
            @include("Layouts.footer")
        </div>
        @include("Layouts.script_site")
    </body>
</html>