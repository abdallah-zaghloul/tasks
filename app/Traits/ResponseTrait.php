<?php
namespace App\Traits;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

trait ResponseTrait
{
    public int $statusCodeSuccess = 200;
    public int $statusCodeCreated = 201;
    public int $statusCodeBadRequest = 400;
    public int $statusCodeTooManyRequests = 429;
    public int $statusCodeUnAuthorized = 401;
    public int $statusCodeForbidden = 403;
    public int $statusCodeNotFound = 404;
    public int $statusCodeNotSupportedMethod = 405;
    public int $statusCodeNotInternalError = 500;
    public int $statusCodeUnavailableServer = 503;
    public int $statusCodeTimeout = 504;

    /**
     * @throws ValidationException
     */
    public function webErrorRedirect(Validator $validator): RedirectResponse
    {
        return redirect()->back()->withErrors($validator)->withInput($validator->validated());
    }


    /**
     * @param string $namedRoute
     * @param array $routeParams
     * @param array $data
     * @return RedirectResponse
     */
    public function webSuccessRedirect(string $namedRoute,array $routeParams = [] ,array $data = []): RedirectResponse
    {
        return redirect()->route($namedRoute, $routeParams)->with($data);
    }
}
