<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Created</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-10">
        <div class="p-6">
            <div class="flex items-center mb-6">
                <svg class="w-12 h-12 text-blue-500 mr-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.001 5.001 0 0010 15a5.001 5.001 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl font-bold text-gray-800">User Account Created</h1>
            </div>
Copy        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
            <p class="text-blue-700 font-medium">
                Dear {{ $user->name }},
            </p>
        </div>

        <div class="space-y-4 text-gray-700">
            <p>
                Your user account for the PaySwitch Visitor Management System has been created. 
                To complete your account setup, please reset your password by clicking the button below.
            </p>

            <div class="text-center my-6">
                <a 
                    href="{{ $resetUrl }}" 
                    class="inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out"
                >
                    Reset Password
                </a>
            </div>

            <div class="bg-gray-100 rounded-lg p-4">
                <p class="text-sm text-gray-600">
                    <strong>Important:</strong> If you did not request this account creation, 
                    please contact our support team immediately.
                </p>
            </div>
        </div>

        <div class="mt-6 border-t pt-4 text-center">
            <p class="text-sm text-gray-600">
                © {{ date('Y') }} Payswitch Visitor Management System
            </p>
        </div>
    </div>
</div>
</body>
</html>