<?php namespace TitaPHP\I18n;

class I18n
{

	public static function getLocale ()
	{
		return \Locale::getDefault();
	}


	/**
	 * @param $number
	 * @param int $decimals
	 * @return string
	 */
	public static function decimal ($value, $decimals = 2)
	{
		$nf = new NumberFormatter(self::getLocale(), NumberFormatter::DECIMAL);
		$nf->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $decimals);
		return $nf->format($value);
	}

	/**
	 * @param $number
	 * @param string $thousands_sep
	 * @return string
	 */
	public static function integer ($value)
	{
		return self::decimal($value, 0);
	}

	/**
	 * @param $number
	 * @param int $decimals
	 * @param string $currencyCode
	 * @return string
	 */
	public static function currency ($value, $decimals = 2, $currencyCode = "EUR")
	{
		$nf = new NumberFormatter(self::getLocale(), NumberFormatter::CURRENCY);
		$nf->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $decimals);
		return $nf->formatCurrency($value, $currencyCode);
	}

	/**
	 * @param $value
	 * @param string $dateFormat can be FULL, LONG, MEDIUM, SHORT, NONE
	 * @return string
	 */
	public static function date ($value, $dateFormat = 'MEDIUM')
	{
		return I18n::datetime($value, $dateFormat, 'NONE');
	}

	/**
	 * @param $value
	 * @param string $dateFormat can be FULL, LONG, MEDIUM, SHORT, NONE
	 * @param string $timeFormat can be FULL, LONG, MEDIUM, SHORT, NONE
	 * @return string
	 */
	public static function datetime ($value, $dateFormat = 'MEDIUM', $timeFormat = 'SHORT')
	{
		$df = new IntlDateFormatter(
			self::getLocale(),
			constant( 'IntlDateFormatter::'.$dateFormat ),
			constant( 'IntlDateFormatter::'.$timeFormat ),
			date_default_timezone_get()
		);
		$dateObj = new DateTime($value);
		return $df->format($dateObj->getTimestamp());
	}


	/**
	 * Method to get the translation for a message.
	 *
	 * Example:
	 * I18n::translate(message);
	 * I18n::translate(message, params);
	 * I18n::translate(scope, message);
	 * I18n::translate(scope, message, params);
	 *
	 * @return string	The translated message.
	 */
	public static function translate()
	{
		$args = func_get_args();
		$data = static::setArgs($args);

		if(!is_string($data['message'])){
			throw new Exception("Translation message must be a valid string");
		}
		if(!is_array($data['params'])){
			throw new Exception("Translation parameters must be a array");
		}

		//TODO: get translation from db

		if (count($data['params'])) {
			$data['message'] = str_replace( array_keys($data['params']), array_values($data['params']), $data['params'] );
		}
		return $data['message'];
	}

	public static function setArgs($args)
	{
		$data = ['scope' => '', 'message' => '', 'params' => []];

		// Translator::t(message);
		if (count($args) === 1) {
			$data['message'] = $args[0];
		}
		// Translator::t(message, params);
		elseif (count($args) === 2 && is_array($args[1])) {
			$data['message'] = $args[0];
			$data['params']  = $args[1];
		}
		// Translator::t(scope, message);
		elseif (count($args) === 2 && is_string($args[1])) {
			$data['scope']   = $args[0];
			$data['message'] = $args[1];
		}
		elseif (count($args) === 3) {
			$data['scope'] 	 = $args[0];
			$data['message'] = $args[1];
			$data['params']  = $args[2];
		}
		$data['params'] = is_array($data['params']) ? $data['params'] : [];
		return $data;
	}

}