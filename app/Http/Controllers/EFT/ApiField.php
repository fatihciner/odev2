<?php
namespace App\Http\Controllers\EFT;

use Validator;

class ApiField
{

	private $type;
	private $name;
	private $value;

	private function __construct($type='', $name='', $value='')
	{
		$this->type = $type;
		$this->name = $name;
		$this->value = $value;
	}

	public static function email($data = '')
	{

//		$validator = Validator::make();
//		$validator->after(function ($validator)  use ($email){
//			if ($email!='24234')
//			{
//				$validator->errors()->add('field', 'Giriş Bilgileri Geçersizzzzz!');
//			}
//		})->validate();

		self::validateFieldData(
				[ FieldType::EMAIL => $data ],
				[ FieldType::EMAIL => 'required|between:5,55' ]
		);
		return new ApiField(FieldType::EMAIL, 'email', $data);

	}

	public static function password($data = '')
	{
		self::validateFieldData(
			[ FieldType::PASSWORD => $data ],
			[ FieldType::PASSWORD => 'required|between:1,40' ]
		);

		return new ApiField(FieldType::PASSWORD, 'password', $data);
	}


	public static function fromDate($data = '')
	{
		self::validateFieldData(
			[ FieldType::FROMDATE => $data ],
			[ FieldType::FROMDATE => 'required|between:1,40' ]
		);
		return new ApiField(FieldType::FROMDATE, 'fromDate', $data);
	}

	public static function transactionId($data = '')
	{
		self::validateFieldData(
			[ FieldType::TRANSACTIONID => $data ],
			[ FieldType::TRANSACTIONID=> 'required|between:1,40' ]
		);
		return new ApiField(FieldType::PASSWORD, 'transactionId', $data);
	}

	public static function toDate($data = '')
	{
		self::validateFieldData(
			[ FieldType::TODATE => $data ],
			[ FieldType::TODATE => 'required|between:1,40' ]
		);
		return new ApiField(FieldType::TODATE, 'toDate', $data);
	}

	public static function page($data = '')
	{
		self::validateFieldData(
			[ FieldType::PAGE => $data ],
			[ FieldType::PAGE => 'required|between:1,400' ]
		);
		return new ApiField(FieldType::PAGE, 'page', $data);
	}


	public static function test($data = '')
	{
		return new ApiField(FieldType::TOKEN, 'tokentest', $data, 'tokentest', '');
	}


	private static function validateFieldData($input=[], $rules=[])
	{
		Validator::make($input, $rules)->validate();
	}

	public function getType()
	{
		return $this->type;
	}

	public function getValue()
	{
		return $this->value;
	}
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

}