<?php

namespace App\Controllers;

class Form extends BaseController
{
	public function index()
	{
		helper(['form']);

		$data = [];
		$data['categories'] = [
			'Student','Teacher','Principle'
		];

		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address',
					'errors'=> [
						'required' => 'Email is required',
						'valid_email'=> 'Please add a valid email address'
					]
				],
				'password' => 'required|min_length[8]',
				'category' => 'in_list[Student, Teacher]',
				'date' 	=> [
					'rules' => 'required|check_date',
					'label' => 'Date',
					'errors'=> [
						'check_date' => 'You can not add a date before today'
					]
				]
			];

			if($this->validate($rules))
			{
				return redirect()->to('/form/success');
			}
			else
			{
				$data['validation'] = $this->validator;
			}
		}

		return view('form',$data);
	}

	function success()
	{
		return 'validation successful!';
	}
	
}
