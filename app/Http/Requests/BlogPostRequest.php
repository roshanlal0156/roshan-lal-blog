<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'title_image' => 'required|url',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'body' => 'required|string',
            'status' => 'required|string|in:draft,published',
            'tags' => 'required|array',
            'tags.*' => 'string'
        ];
    }

    public function getData(): array {
        return [
            'title' => $this->title,
            'title_image' => $this->title_image,
            'description' => $this->description,
            'slug' => $this->slug,
            'body' => $this->body,
            'status' => $this->status,
            'tags' => $this->tags,
        ];
    }
}
