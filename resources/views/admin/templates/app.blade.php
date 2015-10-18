{{-- Main app admin template --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page-title', 'Админ панель')</title>
    <!-- Include Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <!-- Include css styles -->
    <link rel="stylesheet" href="/admin-res/styles/simple-line-icons.css"/>
    <link rel="stylesheet" href="/admin-res/styles/reset.css"/>
    <link rel="stylesheet" href="/admin-res/styles/style.css"/>
</head>
<body>
<div id="wrapper">
    <!-- Top-line -->
    @include('admin.templates.top_line')
    <!-- Main content -->
    <div class="main-content">
        <!-- Left side -->
        <div class="left">
            <!-- User -->
            @include('admin.templates.user')
            <!-- Left navigation -->
            @include('admin.templates.left')
        </div>
        <!-- Right side -->
        <div class="right">
            <h3 class="right-title">@yield('right-block-title', 'Title')</h3>
            @yield('right-content')
        </div>
    </div>
</div>
</body>
</html>