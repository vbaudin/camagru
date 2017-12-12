DB_NAME = conf/camagru.db

all: setup seed

re: drop all

setup:
	@echo "db setup"
	@php conf/install.php

seed:
	@echo "db seed"
	@php conf/seed.php

drop:
	@echo "db drop"
	@rm $(DB_NAME)
