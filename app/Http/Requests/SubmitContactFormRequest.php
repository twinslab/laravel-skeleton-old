<?php namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Lang;

class SubmitContactFormRequest extends Request
{
	/**
	 * {@inheritdoc}
     */
	protected $errorBag = 'contactForm';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required|min:5'
		];
	}


	/**
	 * Overwrite the response method so we are able to pass a custom error message.
	 *
	 * {@inheritdoc}
     */
	public function response(array $errors)
	{
		flash()->error(Lang::get('pages/contact.form.error'));

		return $this->redirector->to($this->getRedirectUrl())
			->withInput($this->except($this->dontFlash))
			->withErrors($errors, $this->errorBag);
	}
}
