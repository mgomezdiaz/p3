<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home')
		->with('path','home');
});

// get the lorem generator form
Route::get('/lorem-gen', function()
{
	return View::make('lorem-form')
		->with('error','')
		->with('content','')
		->with('numParagraphs','2')
		->with('path','lorem-gen');
});

/* get the lorem generator form and display requested 
 * post with the correct number of paragraphs
 */
Route::post('/lorem-gen', function()
{
	// init vars and get num of paragraphs
	$numParagraphs = Input::get('numParagraphs');
	$error = '';
	$content = '';

	// call the generator and create correct num of paragraphs
	if ($numParagraphs > 0 && $numParagraphs < 101)
	{
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($numParagraphs);
		$content = '';

		foreach ($paragraphs as $p)
		{
			$content .= '<p>' . $p . '</p>';
		}
	}
	else // display errors if bad number of paragraphs
	{
		$error = '<ul><li>Please provde an appropraite number of paragraphs from 1-100.</li></ul>';
	}

	// return the view with the lorem text
	return View::make('lorem-form')
		->with('error',$error)
		->with('content',$content)
		->with('numParagraphs',$numParagraphs)
		->with('path','lorem-gen');
});

// get the user generator form
Route::get('/user-gen', function()
{
	return View::make('user-form')
		->with('numUsers','1')
		->with('genBirthday','')
		->with('genProfile','')
		->with('userData','')
		->with('error')
		->with('path','user-gen');
});

// get the user gen form with the generated users
Route::post('/user-gen', function()
{
	// init vars and get form data
	$numUsers = Input::get('numUsers');
	$genBirthday = Input::get('genBirthday');
	$genProfile = Input::get('genProfile');
	$userData = '';
	$error = '';

	// create the fake data generator
	$faker = new Faker\Generator();
	$faker->addProvider(new Faker\Provider\en_US\Person($faker));
	$faker->addProvider(new Faker\Provider\DateTime($faker));
	$faker->addProvider(new Faker\Provider\Lorem($faker));

	// generate the user data
	if ($numUsers > 0 && $numUsers < 101)
	{
		for ($i = 0; $i < $numUsers; $i++)
		{
			$sex = '';

			rand(0,1) == 0 ? $sex = 'male' : $sex = 'female';

			$userData .= '<h2>' . $faker->name($sex) . '</h2>';

			if ($genBirthday == 'on')
				$userData .= $faker->dateTimeThisCentury->format('m-d-Y') . '<br />';

			if ($genProfile == 'on')
				$userData .= $faker->paragraphs(1)[0];
		}
	}
	else // display the errors if not good number of users
	{
		$error = 'Please provide a user count from 1-100';
	}

	// return the form with the user data
	return View::make('user-form')
		->with('numUsers',$numUsers)
		->with('genBirthday',$genBirthday)
		->with('genProfile',$genProfile)
		->with('userData',$userData)
		->with('error',$error)
		->with('path','user-gen');
});



// return 404 for bad page
App::missing(function($exception)
{
	return View::make('error-page')
		->with('path','');
});