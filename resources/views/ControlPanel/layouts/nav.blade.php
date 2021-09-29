<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">Mada Annotation Tool</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">MAT</a>
    </div>
    <ul class="sidebar-menu">
        <li class="dropdown @if(request()->getPathInfo()=="/") active @endif">
            <a href="{{route("cp")}}" class="nav-link "><i
                    class="fas fa-grip-horizontal"></i><span>Dashboard</span></a>
        </li>


        <li class="dropdown @hasSection("sentence.list") active  @endif">
            <a href="{{route("sentence.list")}}" class="nav-link "><i
                    class="fas fa-paragraph"></i><span>Sentence</span></a>
        </li>
        <li class="dropdown">
            <a href="{{url("cp/filemanager")}}" target="_blank" class="nav-link "><i
                    class="fas fa-folder"></i><span>File Manager</span></a>
        </li>
        <li class="dropdown">
            <a href="{{route("front.annotation.list")}}" target="_blank" class="nav-link "><i
                    class="fas fa-toolbox"></i><span>annotation tool</span></a>
        </li>
        <li class="dropdown">
            <a href="{{route("form.list")}}" class="nav-link "><i
                    class="fab fa-wpforms"></i><span>Sign Language Components</span></a>
        </li>


    </ul>

</aside>
