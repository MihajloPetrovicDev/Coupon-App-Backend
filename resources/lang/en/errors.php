<?php

return [
    'general' => [
        'unexcpected_error' => 'An unexpected error occured.',
    ],
    'register' => [
        'first_name_required' => 'First name is required.',
        'first_name_string' => 'First name may only contain letters, spaces, and hyphens.',
        'first_name_max' => 'First name must not be greater than 50 characters.',
        'first_name_regex' => 'First name may only contain letters, spaces, and hyphens.',

        'last_name_required' => 'Last name is required.',
        'last_name_string' => 'Last name may only contain letters, spaces, and hyphens.',
        'last_name_max' => 'Last name may not be greater than 50 characters.',
        'last_name_regex' => 'Last name may only contain letters, spaces, and hyphens.',

        'email_required' => 'Email address is required.',
        'email_email' => 'Invalid email address format.',
        'email_max' => 'Email address may not be greater than 80 characters.',
        'email_unique' => 'This email address is already in use.',

        'password_required' => 'Password is required.',
        'password_min' => 'Password must be at least 6 characters.',
        'password_max' => 'Password may not be greater than 80 characters.',
        'password_regex' => 'Password must contain at least one letter and one number.',
        'password_confirmed' => 'Password confirmation does not match.',
    ],
];