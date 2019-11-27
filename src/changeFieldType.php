<?php

/*
	Necesita tener instalado y habilitado el modulo: Helper

	Este archivo sirve para cambiar el tipo de dato de un campo.
	Es extremadamente irreversible si tiene datos dentro.
	Se recomienda que el tipo de dato sea compatible.

	Tipos de datos:
		number_integer
		number_decimal
		number_float

	Uso:

		parados dentro de: /var/www/html/argentina.gob.ar
		-----------------
		drush scr '/profiles/argentinagobar/modules/contrib/drupar_helpers/src/changeFieldType.php' my_int_field_name number_type
		-----------------

	Donde:
		my_int_field_name = nombre del campo directo desde la db
		number_type = tipo de dato al que lo queremos llevar

	
	Es recomendable hacer los cambios donde fue usado, ejemplo: vista / node-entity.

*/
	
	$field 	= $_SERVER['argv'][3];
	$type 	= $_SERVER['argv'][4];

	FieldChangeHelper::changeType($field, $type);
