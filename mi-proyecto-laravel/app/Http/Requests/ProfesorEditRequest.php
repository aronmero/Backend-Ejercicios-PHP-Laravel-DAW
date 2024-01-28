<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nombre' => 'required|min:3',
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@\S*\.\S*$/i',
            ],
        ];

        // Agrega regla unique si el correo es diferente del correo actual
        $profesor = $this->route('profesor');
   
        if ($profesor) {
            $rules['email'][] = 'unique:profesores,email,' . $profesor;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nombre' => [
                'required' => 'El nombre de usuario es obligatorio.',
                'min' => 'El nombre de usuario debe tener al menos 3 caracteres.',
            ],
            'email' => [
                'required' => 'El correo es obligatorio.',
                'unique' => 'Este correo ya está registrado.',
                'regex' => 'Utilice un correo correcto'
            ],

        ];
    }
}
