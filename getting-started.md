# Getting started with ELGAMMAL

## Base App Layout

Traditionally, you'll start with a layout file which all your pages will inherit. ELGAMMAL includes an "app" layout that you can use as a base for your layout, which includes a header, footer, and left/right sides.

1. Create a "components" directory under "resources/views".
2. Create an "app.blade.php" file under that directory. In its simplest form, it should contain:

```
<x-elgammal::layouts.app>
</x-elgammal::layouts.app>
```
The "layouts.app" component includes a "header" slot that is appropriate for the application name, and a "left" slot that is appropriate for a sidebar menu. The right-hand portion of the layout is for the focus of the current page, and is the 'default' slot. Here is a more fleshed out app.blade.php:

```
<x-elgammal::layouts.app>
<x-slot:header>
    <div class="flex items-center justify-between px-4 py-4">
        <p>ELGAMMAL Test Application</p>
    </div>
</x-slot:header>

<x-slot:left>
    <x-elgammal::menu>
        <x-elgammal::menu.submenu title="Main Menu">
            <x-elgammal::menu.item route="#">Item 1</x-elgammal::menu.item>
            <x-elgammal::menu.item route="#">Item 2</x-elgammal::menu.item>
        </x-elgammal::menu.submenu>
    </x-elgammal::menu.submenu>
</x-slot:left>

{{ $slot }}
</x-elgammal::layouts.app>
```

With this layout, your app's individual pages become quite simple. Take, for example, a welcome page based on your new app.blade.php:

```
<x-app>
<div class="p-8">
    <h1>Welcome!</h1>

    <p>Welcome to the app.</p>
</div>
</x-app>

Your welcome.blade.php is based on your components/app.blade.php, which is in turn based on ELGAMMAL's layouts.app component.
