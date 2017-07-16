# Gamma Correction PHP
Applying gamma correction before resizing an image.

PHP uses the ff formula: https://github.com/php/php-src/blob/master/ext/gd/gd.c

    gamma = input / output;
    (int) ((pow((red   / 255.0), gamma) * 255) + .5)


## License
- Code MIT License
- Test image from Jonas Berlin via [Eric Brasseur](https://web.archive.org/web/20160112115812/http://www.4p8.com/eric.brasseur/gamma.html)