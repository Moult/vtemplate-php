.PHONY : default
default : ;

.PHONY : prepare
prepare :
ifndef VTEMPLATE_CONFIG
	$(error VTEMPLATE_CONFIG is not set)
endif
	cp src/server/config/config.php.example src/server/config/config.php
	sed -i "s|@VTEMPLATE_CONFIG@|$(VTEMPLATE_CONFIG)|" src/server/config/config.php

.PHONY : compile
compile :
	rm -rf dist
	mkdir -p dist
	rm -rf build
	mkdir -p build
	cp -r src/* build/

	rm -rf build/server/bin
	rm -rf build/server/vendor
	curl -sS https://getcomposer.org/installer | php
	mv composer.phar build/server/
	cd build/server && php composer.phar install --no-dev --optimize-autoloader --prefer-dist

	sed -i "s/realpath//" build/server/vendor/kohana/core/classes/Kohana/Core.php
	rm -rf build/server/vendor/kohana/core/tests
	rm -rf build/server/vendor/kohana-module/image/tests
	cd build/server/vendor/mustache/mustache && find . -not -regex "\.\/src.*" -delete
	rm -rf build/server/vendor/symfony/event-dispatcher/Symfony/Component/EventDispatcher/Tests

	rm -f build/server/vtemplate-website.phar
	cd build/server && php make.php
	mv build/server/vtemplate-website.phar dist/

	rm -rf build/client/node_modules
	rm -rf build/client/bower_components

	cd build/client && npm install
	cd build/client && bower install
	cd build/client && ./node_modules/gulp/bin/gulp.js
	cp -r build/client/node_modules dist/

	cd build/www/assets/css && stylus -c main.styl
	cd build/www/assets/css && find . -regex ".*\.styl" -delete

	cp -r build/www dist/

.PHONY : install
install :
ifndef INSTALL_PATH
	$(error INSTALL_PATH is not set)
endif
	mkdir -p $(INSTALL_PATH)lib/vtemplate
	mkdir -p $(INSTALL_PATH)bin
	mkdir -p $(INSTALL_PATH)www
	cp dist/vtemplate-website.phar $(INSTALL_PATH)lib/
	cp -r dist/node_modules $(INSTALL_PATH)lib/makkoto/
	cp -r dist/www/* $(INSTALL_PATH)www/
	mv $(INSTALL_PATH)www/index.php.example $(INSTALL_PATH)www/index.php
	sed -i "s|@VTEMPLATE_WEBSITE@|phar://$(INSTALL_PATH)lib/vtemplate-website.phar|" $(INSTALL_PATH)www/index.php

.PHONY : develop
develop :
	cp src/www/index.php.example src/www/index.php
	sed -i "s|@VTEMPLATE_WEBSITE@|../server|" src/www/index.php
	cp src/server/features/bootstrap/bootstrap.php.example src/server/features/bootstrap/bootstrap.php
	sed -i "s|@VTEMPLATE_WEBSITE@|../server|" src/server/features/bootstrap/bootstrap.php
	curl -sS https://getcomposer.org/installer | php
	mv composer.phar src/server/
	rm -rf src/server/vendor
	cd src/server && php composer.phar update --dev --prefer-dist
	rm -rf src/client/node_modules
	rm -rf src/client/bower_components
	cd src/client && npm install
	cd src/client && bower install
	cd src/client && ./node_modules/gulp/bin/gulp.js
	cd src/www/assets/css && stylus -c main.styl

.PHONY : clean
clean :
	rm -f src/server/config/config.php
	rm -rf dist
	rm -rf build
