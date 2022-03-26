export default definePreset({
	name: 'quality-code-preset',
	options: {},
	handler: async() => {
		await extractTemplates()

		await installPackages({
			title: 'Install Assert package',
			for: 'php',
			install: [
				'webmozart/assert',
			],
		})

		await installPackages({
			title: 'Install PHPStan, PHPCsFixer and CodeSniffer package',
			for: 'php',
			install: [
				'friendsofphp/php-cs-fixer',
				'nunomaduro/larastan',
				'phpstan/phpstan-webmozart-assert',
				'squizlabs/php_codesniffer',
				'thecodingmachine/phpstan-safe-rule'
			],
			dev: true,
		})

		await editFiles({
			title: 'Update composer.json',
			files: 'composer.json',
			operations: [
				{
					type: 'edit-json',
					merge: {
						scripts: {
							'phpstan': 'phpstan --memory-limit=4G',
							'phpcs': 'phpcs',
							'php-cs-fixer': 'php-cs-fixer fix --config .php-cs-fixer.dist.php',
							'phpcbf': 'phpcbf || true',
							'style:fix': [
								'@phpcbf',
								'@php-cs-fixer'
							]
						}
					},
				}
			],
		})
	},
})
