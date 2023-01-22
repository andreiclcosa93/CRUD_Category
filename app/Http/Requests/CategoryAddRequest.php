<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'slug' => 'required|max:255',
            'subtitle' => 'max:255',
            'excerpt' => 'max:6000',
            'views' => 'required|numeric|min:0',


            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',

            'photo' => 'max:1024',
        ];
    }

    public function message()
    {
        return[
            'title.required' => 'entering the title is mandatory',
            'title.max' => 'title cannot be more than 50 characters',

            'slug.required' => 'entering the slug is mandatory',
            'slug.max' => 'title cannot be more than 255 characters',
            // 'slug.unique' => 'the slug must be registered',

            'subtitle.max' => 'subtitle cannot be more than 255 characters',

            'excerpt.max' => 'subtitle cannot be more than 6000 characters',

            'views.required' => 'entering the views is mandatory',
            'views.min' => 'the views field must be greater than 0',

            'meta_title.max' => 'meta_title cannot be more than 50 characters',
            'meta_description.max' => 'meta_description cannot be more than 50 characters',
            'meta_keywords.max' => 'meta_keywords cannot be more than 50 characters',

            'photo.max' => 'The photo cannot be more than 1024 Mb',
        ];
    }
}
