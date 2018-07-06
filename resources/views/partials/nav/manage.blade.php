<div class="side-menu">
    <aside class="menu m-t-25 p-l-5">

        <p class="menu-label">
            {{ __('manage.general') }}
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('manage.dashboard') }}" class="{{ Nav::isRoute('manage.dashboard') }}">{{ __('manage.dashboard') }}</a></li>
        </ul>

        <p class="menu-label">
            {{ __('manage.administration') }}
        </p>
        <ul class="menu-list">
            <li>
                <a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'], 3)}}">{{__('manage.roles&permissions')}}</a>
                <ul class="submenu">
                    <li><a href="{{ route('roles.index') }}" class="{{ Nav::isResource('roles') }}">{{__('manage.roles')}}</a></li>
                    <li><a href="{{ route('permissions.index') }}" class="{{ Nav::isResource('permissions') }}">{{ __('manage.permissions') }}</a></li>
                </ul>
            </li>
            <li><a href="{{ route('users.index') }}" class="{{ Nav::isResource('users') }}">{{ __('manage.manageUsers') }}</a></li>
        </ul>

        <p class="menu-label">
            {{ __('manage.content') }}
        </p>
        <ul class="menu-list">
        <li><a href="{{ route('slides.index')}}" class="{{ Nav::isResource('slides') }}"> {{ __('manage.slides') }}</a></li>
        </ul>
        
    </aside>
</div>