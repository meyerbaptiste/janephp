<?php

namespace Github\Endpoint;

class TeamsUpdateDiscussionCommentInOrg extends \Github\Runtime\Client\BaseEndpoint implements \Github\Runtime\Client\Endpoint
{
    protected $org;
    protected $team_slug;
    protected $discussion_number;
    protected $comment_number;
    /**
     * Edits the body text of a discussion comment. OAuth access tokens require the `write:discussion` [scope](https://developer.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
     **Note:** You can also specify a team by `org_id` and `team_id` using the route `PATCH /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}/comments/{comment_number}`.
     *
     * @param string $org 
     * @param string $teamSlug team_slug parameter
     * @param int $discussionNumber 
     * @param int $commentNumber 
     * @param null|\Github\Model\OrgsOrgTeamsTeamSlugDiscussionsDiscussionNumberCommentsCommentNumberPatchBody $requestBody 
     */
    public function __construct(string $org, string $teamSlug, int $discussionNumber, int $commentNumber, ?\Github\Model\OrgsOrgTeamsTeamSlugDiscussionsDiscussionNumberCommentsCommentNumberPatchBody $requestBody = null)
    {
        $this->org = $org;
        $this->team_slug = $teamSlug;
        $this->discussion_number = $discussionNumber;
        $this->comment_number = $commentNumber;
        $this->body = $requestBody;
    }
    use \Github\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'PATCH';
    }
    public function getUri(): string
    {
        return str_replace(['{org}', '{team_slug}', '{discussion_number}', '{comment_number}'], [$this->org, $this->team_slug, $this->discussion_number, $this->comment_number], '/orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments/{comment_number}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Github\Model\OrgsOrgTeamsTeamSlugDiscussionsDiscussionNumberCommentsCommentNumberPatchBody) {
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
     *
     * @return null|\Github\Model\TeamDiscussionComment
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Github\Model\TeamDiscussionComment', 'json');
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}