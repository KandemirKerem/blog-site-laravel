<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Ortak kurallar
        $rules = [
            'title'       => ['required', 'string', 'min:3', 'max:255'],
            'context'     => ['required', 'string', 'min:10'],
            'excerpt'     => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['nullable', 'string'],
        ];

        // İSTEK TİPİNE GÖRE IMAGE KURALINI DEĞİŞTİR
        // isMethod('post') -> Create (Store) işlemi
        // isMethod('patch') veya isMethod('put') -> Update işlemi

        if ($this->isMethod('post')) {
            // Yeni kayıt oluştururken resim ZORUNLU
            $rules['image_path'] = ['required', 'string'];
        } else {
            // Güncelleme yaparken resim OPSİYONEL (nullable)
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'];
        }

        return $rules;
    }
}
