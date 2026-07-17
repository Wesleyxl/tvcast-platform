<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'login' => ['required_without_all:email,username', 'string', 'max:255'],
            'email' => ['required_without_all:login,username', 'string', 'email', 'max:255'],
            'username' => ['required_without_all:login,email', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * @return array{email?: string, username?: string, password: string}
     */
    public function credentials(): array
    {
        $identifier = $this->string('login')->toString();

        if ($identifier !== '') {
            $field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            return [
                $field => $identifier,
                'password' => $this->string('password')->toString(),
            ];
        }

        $field = $this->filled('email') ? 'email' : 'username';

        return [
            $field => $this->string($field)->toString(),
            'password' => $this->string('password')->toString(),
        ];
    }
}
