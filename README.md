# lorem
Lorem ipsum generator in PHP

## Install
```
composer require spigo/lorem
```
After you have installed open your Laravel config file config/app.php and add the following lines. In the $providers array add the service providers for this package.
```
Spigo\Lorem\LoremServiceProvider::class
```
#Usage
Access Lorem by using the global helper lorem()

## HTML
```html
<body>
    <div class="content">
        <!-- Returns one paragraph of lorem ipsum -->
        {!! lorem()->paragraph()->getHtml() !!}
    </div>
</body>
```
```html
<body>
    <div class="content">
        <!-- Returns 17 paragraphs of lorem ipsum -->
        {!! lorem()->paragraphs(17)->getHtml() !!}
    </div>
</body>
```
## Image

```html
<body>
    <div class="content">
        <!-- Returns an img tag of a image (1024x1024) -->
        {!! lorem()->image()->getHtml() !!}
    </div>
</body>
```
```html
<body>
    <div class="content">
        <!-- Returns an img tag of a image (1000x600) with class -->
        {!! lorem()->image(1000, 600, ['class' => 'img-responsive']) !!}
    </div>
</body>
```
```html
<body>
        <!-- Returns an url of a image (200x200) -->
    <div style="background-image: url({!! lorem()->imageUrl(200,200)->get() !!})"></div>
    </div>
</body>
```

## Text
```html
<body>
    <!-- Returns one paragraph of lorem ipsum in pure text -->
    <textarea>{!! lorem()->paragraph()->get() !!}</textarea>
</body>
```
```html
<body>
    <!-- Returns 17 paragraphs of lorem ipsum in pure text -->
    <textarea>{!! lorem()->paragraphs(17)->get() !!}</textarea>
</body>
```