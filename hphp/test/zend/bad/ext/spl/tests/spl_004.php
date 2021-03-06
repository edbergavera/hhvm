<?php

function my_error_handler($errno, $errstr, $errfile, $errline) {
	echo "Error: $errstr\n";
}

set_error_handler('my_error_handler');

function test_arg($arg)
{
	if ($arg instanceof Iterator)
	{
		var_dump($arg->key());
		var_dump($arg->current());
	}
	else
	{
		var_dump($arg);
	}
	return true;
}

function test()
{
	static $arg = 0;
	var_dump($arg++);
	return true;
}

$it = new RecursiveArrayIterator(array(1, array(21, 22), 3));

var_dump(iterator_apply($it, 'test', NULL));

echo "===ARGS===\n";
var_dump(iterator_apply($it, 'test_arg', array($it)));

echo "===RECURSIVE===\n";
$it = new RecursiveIteratorIterator($it);
var_dump(iterator_apply($it, 'test'));

echo "===ERRORS===\n";
var_dump(iterator_apply($it, 'test', 1));
var_dump(iterator_apply($it, 'non_existing_function'));
var_dump(iterator_apply($it, 'non_existing_function', NULL, 2));

?>
===DONE===
<?php exit(0); ?>
