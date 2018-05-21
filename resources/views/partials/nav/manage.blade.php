<div class="side-menu">
    <aside class="menu m-t-25 p-l-5">

        <p class="menu-label">
            {{__('manage.general')}}
        </p>
        <ul class="menu-list">
            <li><a href="{{route('manage.dashboard')}}" class="{{Nav::isRoute('manage.dashboard')}}">{{__('manage.dashboard')}}</a></li>
        </ul>

        <p class="menu-label">
            {{__('manage.administration')}}
        </p>
        <ul class="menu-list">
            <li><a href="{{route('users.index')}}" class="{{Nav::isResource('users')}}">{{__('manage.manageUsers')}}</a></li>
            <li>
                <a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'], 2)}}">{{__('manage.roles&permissions')}}</a>
                <ul class="submenu">
                    <li><a href="{{route('roles.index')}}" class="{{Nav::isResource('roles')}}">{{__('manage.roles')}}</a></li>
                    <li><a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions')}}">{{__('manage.permissions')}}</a></li>
                </ul>
            </li>
            <li>
                <a class="has-submenu">Example Accordion</a>
                <ul class="submenu">
                    <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                </ul>
            </li>
           
        </ul>
        
    </aside>
</div>