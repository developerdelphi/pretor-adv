@php
Menu()->create('navbar', function($menu) {
    $menu->url('/', 'Home', 1);

    $menu->route('/', 'About', ['user' => '1'], 2);

    $menu->dropdown('Settings', function ($sub) {
        $sub->header('ACCOUNT');
        $sub->url('/settings/design', 'Design');
        $sub->divider();
        $sub->url('logout', 'Logout');
    }, 3);
});
@endphp
