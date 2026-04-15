@section('theme::nav')
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom nav-tabs-floating">
                <ul class="nav nav-tabs">
                    <li @if($activeTab === 'theme')class="active"@endif><a href="{{ route('admin.theme') }}">General</a></li>
                    <li @if($activeTab === 'color')class="active"@endif><a href="{{ route('admin.theme.color') }}">Colors</a></li>
                    <li @if($activeTab === 'nova')class="active"@endif><a href="{{ route('admin.theme.nova') }}"><i class="fa fa-star"></i> Nova Theme</a></li>
                    <li @if($activeTab === 'meta')class="active"@endif><a href="{{ route('admin.theme.meta') }}">Meta</a></li>
                    <li @if($activeTab === 'button')class="active"@endif><a href="{{ route('admin.theme.button') }}">Buttons</a></li>
                    <li @if($activeTab === 'element')class="active"@endif><a href="{{ route('admin.theme.element') }}">Elements</a></li>
                    <li @if($activeTab === 'alert')class="active"@endif><a href="{{ route('admin.theme.alert') }}">Alerts</a></li>
                    <li @if($activeTab === 'social')class="active"@endif><a href="{{ route('admin.theme.social') }}">Social</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
