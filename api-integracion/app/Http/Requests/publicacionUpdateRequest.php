<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class publicacionUpdateRequest extends FormRequest
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
        return [
            'imagen' => 'string',
            'titulo' => 'string|max:30',
            'descripcion' => 'string|max:150',
            'tipo_id' => 'exists:tipo_publicaciones,id',
            'fecha_publicacion' => 'date',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'activo' => 'boolean',
            'comercios' => 'array|min:1|exists:comercios,usuario_id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo' => [
                'max' => 'El título no puede tener más de :max caracteres.',
            ],
            'descripcion' => [
                'max' => 'La descripción no puede tener más de :max caracteres.',
            ],
            'tipo_id' => [
                'exists' => 'El tipo de publicación seleccionado no es válido.',
            ],
            'fecha_publicacion' => [
                'date' => 'La fecha de publicación debe ser una fecha válida.',
            ],
            'fecha_inicio' => [
                'date' => 'La fecha de inicio debe ser una fecha válida.',
            ],
            'fecha_fin' => [
                'date' => 'La fecha de fin debe ser una fecha válida.',
            ],
            'activo' => [
                'boolean' => 'El campo activo debe ser verdadero o falso.',
            ],
            'comercios' => [
                'array' => 'Debe seleccionar al menos un comercio.',
                'min' => 'Debe seleccionar al menos un comercio.',
                'exists'=> 'Uno o más de los comercios seleccionados no son válidos.'
            ],
        ];
        
    }
}