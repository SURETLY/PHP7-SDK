<?php

namespace Suretly\LenderApi\Config;

/**
 * Class Config
 * @package Suretly\LenderApi\Config
 */
final class Config implements ConfigInterface
{
    public const SDK_NAME = 'lenderSDK-PHP7';
    private const VERSION = 'version';

    public static $VERSIONS = ['v2'];
    public static $SDK_VERSIONS = ['1.0'];

    /**
     * @var string $sdkVersion SDK version
     */
    private $sdkVersion = '1.0';

    /**
     * @var string $version API version
     */
    private $version = 'v2';

    /**
     * @var string $scheme Scheme
     */
    private $scheme = 'https';

    /**
     * @var string $host Host
     */
    private $host;

    /**
     * @var string $port Port
     */
    private $port = '3000';

    /**
     * @var string $id Client ID
     */
    private $id;

    /**
     * @var string $token Client token
     */
    private $token;

    /**
     * Config constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['id'])) {
            $this->id = $config['id'];
        }

        if (isset($config['token'])) {
            $this->token = $config['token'];
        }

        if (isset($config['sdk'])) {
            if (in_array($config['sdk'], self::$SDK_VERSIONS)) {
                $this->sdkVersion = $config['sdk'];
            } else {
                throw new \InvalidArgumentException('You must use one of the SDK versions: ' . implode(self::$VERSIONS));
            }
        }

        if (isset($config[self::VERSION])) {
            if (in_array($config[self::VERSION], self::$VERSIONS)) {
                $this->version = $config[self::VERSION];
            } else {
                throw new \InvalidArgumentException('You must use one of the versions: ' . implode(self::$VERSIONS));
            }
        }

        if (!isset($config['server'])) {
            $this->host = 'develop.suretly.io';
        } else {
            $this->host = $config['server'] . '.suretly.io';
        }
    }

    /**
     * @inheritdoc
     */
    public function getApiURL(): string
    {
        return $this->scheme . '://' . $this->host . ':' . $this->port . '/' . $this->version;
    }

    /**
     * @inheritdoc
     */
    public function getAuthToken(): string
    {
        $randomID = bin2hex(random_bytes(4));

        return $this->id . '-' . $randomID . '-' . md5($randomID . $this->token);
    }

    /**
     * @inheritdoc
     */
    public function getUserAgent(): string
    {
        return  self::SDK_NAME . '/' . $this->getSdkVersion();
    }

    /**
     * @return string
     */
    public function getSdkVersion(): string
    {
        return $this->sdkVersion;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}