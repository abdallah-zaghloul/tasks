<?php /** @noinspection PhpDynamicAsStaticMethodCallInspection */

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseTrait;
use App\Enums\TaskStatusEnum;
class UpdateTaskRequest extends FormRequest
{
    use ResponseTrait;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'=> ['required', 'string', Rule::unique(app(Task::class)->getTable() ,'name')->ignore($this->route('id')), 'max:50'],
            'description'=> ['required', 'string', 'max:255'],
            'status' => [Rule::in(TaskStatusEnum::ALL)],
        ];
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): RedirectResponse
    {
        return $this->webErrorRedirect($validator);
    }
}
