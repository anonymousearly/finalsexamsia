<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class AuthorsService
{
    use ConsumesExternalService;

    public $baseUri;
    /**
     * The secret to consume the User1 Service
     * @var string
     */
    
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

   public function createAuthors($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }


    public function showAuthors($id)
    {
    return $this->performRequest('GET', "/authors/{$id}");
    }
    public function updateAuthors($data, $id)
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }
    public function deleteAuthors($id)
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }

}
