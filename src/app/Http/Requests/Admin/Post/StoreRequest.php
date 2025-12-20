<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Дружочек пирожочек ты забыл заполнить поле',
            'title.string' => 'Атата это должна быть строка',

            'content.required' => 'Дружочек пирожочек ты забыл заполнить поле',
            'content.string' => 'Атата это должна быть строка',

            'preview_image.required' => 'Дружочек пирожочек ты забыл добавить картинку',
            'preview_image.file' => 'Атата это должен быть файл',

            'main_image.required' => 'Дружочек пирожочек ты забыл добавить картинку',
            'main_image.file' => 'Атата это должен быть файл',

            'category_id.required' => 'Ты забыл про категорию',
            'category_id.integer' => 'Если ты это видишь это жестко, как ты передал не число ?',
            'category_id.exist' =>'Как ты блять из списка выбрал то что не входит в этот список?',

            'tags_ids.array' => 'ну тут должен быть массив',
            'tags_ids.exist' => 'ну ты и мамкин хацкер',
        ];
    }
}
