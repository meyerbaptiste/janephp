<?php

namespace Github\Endpoint;

class ReposCreateDeployKey extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $owner;
    protected $repo;
    /**
     * You can create a read-only deploy key.
     *
     * @param string $owner 
     * @param string $repo 
     * @param null|\Github\Model\ReposOwnerRepoKeysPostBody $requestBody 
     */
    public function __construct(string $owner, string $repo, ?\Github\Model\ReposOwnerRepoKeysPostBody $requestBody = null)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->body = $requestBody;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(['{owner}', '{repo}'], [$this->owner, $this->repo], '/repos/{owner}/{repo}/keys');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Github\Model\ReposOwnerRepoKeysPostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Github\Exception\ReposCreateDeployKeyUnprocessableEntityException
     *
     * @return null|\Github\Model\DeployKey
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Github\Model\DeployKey', 'json');
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Github\Exception\ReposCreateDeployKeyUnprocessableEntityException($serializer->deserialize($body, 'Github\Model\ValidationError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}