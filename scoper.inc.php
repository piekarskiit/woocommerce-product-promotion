<?php
/**
 * @link https://github.com/humbug/php-scoper
 */

declare( strict_types=1 );

use Isolated\Symfony\Component\Finder\Finder;

return [
	'prefix'  => 'WPPVendor',
	'finders' => [
		Finder::create()
			->files()
			->ignoreVCS( true )
			->notName( '/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/' )
			->exclude( [
				'doc',
				'test',
				'test_old',
				'tests',
				'Tests',
				'vendor-bin',
			] )
			->in( [
				'vendor',
			] )
			->filter( static function ( SplFileInfo $file ) {
				$path = str_replace( '\\', '/', $file->getPathname() );

				if ( $path === 'vendor/autoload.php' ) {
					return false;
				} elseif ( strpos( $path, 'vendor/composer/' ) !== false ) {
					return false;
				}

				return true;
			} ),
	],
];
