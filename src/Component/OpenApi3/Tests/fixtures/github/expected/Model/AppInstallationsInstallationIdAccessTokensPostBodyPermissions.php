<?php

namespace Github\Model;

class AppInstallationsInstallationIdAccessTokensPostBodyPermissions extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string
     */
    protected $contents;
    /**
     * 
     *
     * @var string
     */
    protected $issues;
    /**
     * 
     *
     * @var string
     */
    protected $deployments;
    /**
     * 
     *
     * @var string
     */
    protected $singleFile;
    /**
     * 
     *
     * @var string
     */
    protected $defNotARepo;
    /**
     * 
     *
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }
    /**
     * 
     *
     * @param string $contents
     *
     * @return self
     */
    public function setContents(string $contents): self
    {
        $this->initialized['contents'] = true;
        $this->contents = $contents;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getIssues(): string
    {
        return $this->issues;
    }
    /**
     * 
     *
     * @param string $issues
     *
     * @return self
     */
    public function setIssues(string $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getDeployments(): string
    {
        return $this->deployments;
    }
    /**
     * 
     *
     * @param string $deployments
     *
     * @return self
     */
    public function setDeployments(string $deployments): self
    {
        $this->initialized['deployments'] = true;
        $this->deployments = $deployments;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSingleFile(): string
    {
        return $this->singleFile;
    }
    /**
     * 
     *
     * @param string $singleFile
     *
     * @return self
     */
    public function setSingleFile(string $singleFile): self
    {
        $this->initialized['singleFile'] = true;
        $this->singleFile = $singleFile;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getDefNotARepo(): string
    {
        return $this->defNotARepo;
    }
    /**
     * 
     *
     * @param string $defNotARepo
     *
     * @return self
     */
    public function setDefNotARepo(string $defNotARepo): self
    {
        $this->initialized['defNotARepo'] = true;
        $this->defNotARepo = $defNotARepo;
        return $this;
    }
}