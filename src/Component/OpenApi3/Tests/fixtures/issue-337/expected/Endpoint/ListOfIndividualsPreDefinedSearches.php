<?php

namespace CreditSafe\API\Endpoint;

class ListOfIndividualsPreDefinedSearches extends \CreditSafe\API\Runtime\Client\BaseEndpoint implements \CreditSafe\API\Runtime\Client\Endpoint
{
    /**
     * This endpoint returns the list of all available company `predefined Search` types. A `predefined Search` is defined by the compliance watchlist to be be screened, the confidence in matches returned by your search and the entity type (company or person). They are set at 5% increments between 75-100% match confidence. For example - Searching against the `predefined Search` `p-Sanct-95` will look to match your search criteria against the Individuals/Person Sanctions watchlist and return anything with 95% match confidence.
     *
     * @param array $headerParameters {
     *     @var string $Authorization Bearer JWT (Authentication Token) generated from the /authenticate endpoint.
     * }
     */
    public function __construct(array $headerParameters = [])
    {
        $this->headerParameters = $headerParameters;
    }
    use \CreditSafe\API\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/compliancetemp/people/predefinedSearches';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Authorization']);
        $optionsResolver->setRequired(['Authorization']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesBadRequestException
     * @throws \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesUnauthorizedException
     * @throws \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesForbiddenException
     *
     * @return null|\CreditSafe\API\Model\CompliancePreDefinedSearches
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'CreditSafe\API\Model\CompliancePreDefinedSearches', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesBadRequestException($response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \CreditSafe\API\Exception\ListOfIndividualsPreDefinedSearchesForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}