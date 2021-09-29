<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <style>
        .modal-backdrop {
            z-index: -1;
            position: unset !important;
        }
    </style>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title","Mada")</title>

@include("ControlPanel.layouts.css")
@yield("cssContent")
    @livewireStyles
    <script src="{{asset("js/alpine.min.js")}}" defer></script>

    <!-- /END GA --></head>

<body dir="ltr">
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg" style="height: 60px;"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

                </ul>
            </form>
           @include("ControlPanel.layouts.rightNav")
        </nav>
        <div class="main-sidebar sidebar-style-2">
            @include("ControlPanel.layouts.nav")
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-breadcrumb-color">
                    @yield("breadcrumb")
                </ol>
            </nav>
                <section class="section">
                    <div class="section-header">

                        <div  style="width: 100%;">
                            @yield("header")
                        </div>
                    </div>

                    <div class="card ">

                        <div class="card-body m-2">
                            {{$slot ?? ''??""}}
                        </div>
                    </div>
                </section>
                <!--       content-->

        </div>
        @include("ControlPanel.layouts.footer")
    </div>
</div>

@include("ControlPanel.layouts.js")
@yield("jsContent")
@livewireScripts
<script src="{{asset("js/livewire-turbolinks.js")}}" data-turbolinks-eval="false"></script>
</body>
</html>
