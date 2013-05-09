<?php

namespace UAParser;

use UAParser\Result;
use UAParser\Result\ResultFactory;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class UAParser implements UAParserInterface
{
    /**
     * @var array
     */
    private $regexes = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->regexes = Yaml::parse(__DIR__.'/../../regexes.yml');
    }

    /**
     * {@inheritDoc}
     */
    public function parse($userAgent, $referer = null)
    {
        $data = array(
            'browser'          => $this->parseBrowser($userAgent),
            'operating_system' => $this->parseOperatingSystem($userAgent),
        );

        return $this->prepareResult($data);
    }

    /**
     * Parse the browser
     * 
     * @param string $userAgent the user agent string
     * 
     * @return array
     */
    protected function parseBrowser($userAgent)
    {
        $result = array(
            'family' => 'Other',
            'major'  => null,
            'minor'  => null,
            'patch'  => null,
        );

        foreach ($this->regexes['browser_parsers'] as $browserRegexe) {
            if (preg_match('/'.str_replace('/','\/',str_replace('\/','/', $browserRegexe['regex'])).'/i', $userAgent, $browserMatches)) {
                if (!isset($browserMatches[1])) { $browserMatches[1] = 'Other'; }
                if (!isset($browserMatches[2])) { $browserMatches[2] = null; }
                if (!isset($browserMatches[3])) { $browserMatches[3] = null; }
                if (!isset($browserMatches[4])) { $browserMatches[4] = null; }
                
                $result['family'] = isset($browserRegexe['family_replacement']) ? str_replace('$1', $browserMatches[1], $browserRegexe['family_replacement']) : $browserMatches[1];
                $result['major']  = isset($browserRegexe['major_replacement']) ? $browserRegexe['major_replacement'] : $browserMatches[2];
                $result['minor']  = isset($browserRegexe['minor_replacement']) ? $browserRegexe['minor_replacement'] : $browserMatches[3];
                $result['patch']  = isset($browserRegexe['patch_replacement']) ? $browserRegexe['patch_replacement'] : $browserMatches[4];

                goto rederingEngine;
            }
        }

        rederingEngine:

        foreach ($this->regexes['rendering_engine_parsers'] as $renderingEngineRegex) {
            if (preg_match('/'.str_replace('/','\/',str_replace('\/','/', $renderingEngineRegex['regex'])).'/i', $userAgent, $renderingEngineMatches)) {
                if (!isset($renderingEngineMatches[1])) { $renderingEngineMatches[1] = 'Other'; }
                
                $result['rendering_engine'] = isset($renderingEngineRegex['rendering_engine_replacement']) ? str_replace('$1', $renderingEngineMatches[1], $renderingEngineRegex['rendering_engine_replacement']) : $renderingEngineMatches[1];

                return $result;
            }
        }

        return $result;
    }

    /**
     * Parse the operating system
     * 
     * @param string $userAgent the user agent string
     * 
     * @return array
     */
    protected function parseOperatingsystem($userAgent)
    {
        $result = array(
            'family' => 'Other',
            'major'  => null,
            'minor'  => null,
            'patch'  => null,
        );

        foreach ($this->regexes['operating_system_parsers'] as $operatingSystemRegex) {
            if (preg_match('/'.str_replace('/','\/',str_replace('\/','/', $operatingSystemRegex['regex'])).'/i', $userAgent, $matches)) {
                if (!isset($matches[1])) { $matches[1] = 'Other'; }
                if (!isset($matches[2])) { $matches[2] = null; }
                if (!isset($matches[3])) { $matches[3] = null; }
                if (!isset($matches[4])) { $matches[4] = null; }
                
                $result['family'] = isset($operatingSystemRegex['family_replacement']) ? str_replace('$1', $matches[1], $operatingSystemRegex['family_replacement']) : $matches[1];
                $result['major']  = isset($operatingSystemRegex['major_replacement']) ? $operatingSystemRegex['major_replacement'] : $matches[2];
                $result['minor']  = isset($operatingSystemRegex['minor_replacement']) ? $operatingSystemRegex['minor_replacement'] : $matches[3];
                $result['patch']  = isset($operatingSystemRegex['patch_replacement']) ? $operatingSystemRegex['patch_replacement'] : $matches[4];

                return $result;
            }
        }

        return $result;
    }

    /**
     * Prepare the result set
     * 
     * @param array $data An array of data.
     *
     * @return ResultInterface
     */
    protected function prepareResult(array $data = array())
    {
        $resultFactory = new ResultFactory();

        return $resultFactory->createFromArray($data);
    }
}